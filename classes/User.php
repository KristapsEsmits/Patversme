<?php
class User
{
    private $_db,
    $_data,
    $_sessionName,
    $_cookieName,
    $_isLoggedIn;

    public function __construct($user = null)
    {
        $this->_db = DB::getInstance();

        $this->_sessionName = Config::get('session/session_name');
        $this->_cookieName = Config::get('remember/cookie_name');

        if (!$user) {
            if (Session::exists($this->_sessionName)) {
                $user = Session::get($this->_sessionName);

                if ($this->find($user)) {
                    $this->_isLoggedIn = true;
                } else {
                    //logout
                }
            }
        } else {
            $this->find($user);
        }

    }

    //Methon that will register users
    public function create($fields = array())
    {
        if ($this->_db->insert('users', $fields)) {
            throw new Exception('There was a problem creating an account.');
        }
    }

    public function find($user = null)
    {
        if ($user) {
            $field = (is_numeric($user)) ? 'id' : 'username';
            $data = $this->_db->get('users', array($field, '=', $user));

            if ($data->count()) {
                $this->_data = $data->results()[0];
                return true;
            }

        }
        return false;
    }

    public function login($username = null, $password = null, $remember = false): bool
    {
        if (!$username && !$password && $this->exists()) {
            Session::put($this->_sessionName, $this->data()->id);
        } else {
            $user = $this->find($username);

            if ($user) {
                $salt = $this->data()->salt;

                if ($this->data()->password === Hash::make($password, $salt)) {
                    Session::put($this->_sessionName, $this->data()->id);

                    //If remember me checked
                    if ($remember) {
                        $hash = Hash::unique();
                        //Check in db is user id exists in table
                        $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));

                        //If it doesnt exist - inset a hash in db (only one record pre user)
                        if (!$hashCheck->count()) {
                            $this->_db->insert(
                                'users_session',
                                array(
                                    'user_id' => $this->data()->id,
                                    'hash' => $hash
                                )
                            );
                        } else {
                            $hash = $hashCheck->results()[0]->hash;
                        }

                        Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));


                    }

                    return true;
                }
            }

        }
        return false;
    }

    public function hasPermission($key)
    {
        if ($this->data() && $this->data()->group) {
            $group = $this->_db->get('groups', array('id', '=', $this->data()->group));

            if ($group->count()) {
                $permissions = json_decode($group->results()[0]->permissions, true);

                if (isset($permissions[$key]) && $permissions[$key] == true) {
                    return true;
                }
            }
        }
        return false;
    }

    public function exists()
    {
        return (!empty($this->_data)) ? true : false;
    }

    public function logout()
    {
        $this->_db->delete('users_session', array('user_id', '=', $this->data()->id));

        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }

    public function data()
    {
        return $this->_data;
    }

    public function isLoggedIn()
    {
        return $this->_isLoggedIn;
    }

    public function update($fields = array(), $id = null)
    {
        if (!$id && $this->isLoggedIn()) {
            $id = $this->data()->id;
        }

        if ($this->_db->update('users', $id, $fields)) {
            $error = $this->_db->error();
            throw new Exception('There was a problem updating: ' . $error);
        }
    }
}