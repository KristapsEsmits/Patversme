<?php
/**
 * Summary of User
 */
class User
{
    private $_db,
    $_data,
    $_sessionName;

    public function __construct($user = null)
    {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');
    }

    #Methon that will register users
    /**
     * Methon that will register users
     * @param mixed $fields
     * @throws Exception problem creating an account
     * @return void
     */
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

    public function login($username = null, $password = null) : bool
    {
        $user = $this->find($username);
        if ($user) {
            $salt = $this->data()->salt;

            if ($this->data()->password === Hash::make($password, $salt)) {
                Session::put($this->_sessionName, $this->data()->id);
                return true;
            }
        }

        return false;
    }

    private function data()
    {
        return $this->_data;
    }
}