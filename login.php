<?php
require_once 'core/init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {

        $validate = new Validate();
        $validation = $validate->check(
            $_POST,
            array(
                'username' => array('required' => true),
                'password' => array('required' => true)
            )
        );

        if ($validation->passed()) {
            $user = new User();
            $login = $user->login(Input::get('username'), Input::get('password'));

            if ($login) {
                echo 'in';
            } else {
                echo '<p>aaaaaaaaaaaaaaa</p>';
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
        <lable for="username">Username</lable>
        <input type="text" name="username" id="username" autocomplete="off">
    </div>

    <div class="field">
        <lable for="password">Password</lable>
        <input type="password" name="password" id="password" autocomplete="off">
    </div>

    <input type="hidden" name="token" value=<?php echo Token::generate(); ?>>
    <input type="submit" value="Log in">
</form>