<?php
require_once 'core/init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check(
            $_POST,
            array(
                'username' => array(
                    'required' => true,
                    'min' => 3,
                    'max' => 20,
                    'unique' => 'users'
                ),
                'password' => array(
                    'required' => true,
                    'min' => 6
                ),
                'password_again' => array(
                    'required' => true,
                    'matches' => 'password'
                ),
                'name' => array(
                    'required' => true,
                    'min' => 3,
                    'max' => 50,
                ),
                'surname' => array(
                    'required' => true,
                    'min' => 3,
                    'max' => 50,
                ),
                'email' => array(
                    'required' => true,
                    'min' => 3,
                    'max' => 50,
                    'email' => true,
                ),
                'phone' => array(
                    'required' => true,
                    'min' => 3,
                    'max' => 20,
                )
            )
        );

        if ($validation->passed()) {
            #Gives access to database
            $user = new User();

            $salt = Hash::salt(32);

            try {
                $user->create(
                    array(
                        'username' => Input::get('username'),
                        'password' => Hash::make(Input::get('password'), $salt),
                        'salt' => $salt,
                        'name' => Input::get('name'),
                        'surname' => Input::get('surname'),
                        'email' => Input::get('email'),
                        'phone' => Input::get('phone'),
                        'group' => 1
                    )
                );

                Session::flash('home', 'You have been registered and now can log in!');
                Redirect::to('index.php');
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            foreach ($validation->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
?>

<form action="" method="post">
    <div class="field">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo Input::get('username'); ?>"
            autocomplete="off">
    </div>

    <div class="field">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>

    <div class="field">
        <label for="password_again">Enter your password again</label>
        <input type="password" name="password_again" id="password_again" value="">
    </div>

    <div class="field">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo Input::get('name'); ?>">
    </div>

    <div class="field">
        <label for="surname">Surname</label>
        <input type="text" name="surname" id="surname">
    </div>

    <div class="field">
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email">
    </div>

    <div class="field">
        <label for="phone">Phone number</label>
        <input type="text" name="phone" id="phone">
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="Register">
</form>