<?php
require_once 'core/init.php';

if (Session::exists('user')) {
    Redirect::to('index.php');
}

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

            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);
            if ($login) {
                Redirect::to('index.php');
            } else {
                ?>
                <p class="error">Nepareizs e-pasts un/vai parole!</p>
                <?php
            }
        } else {
            foreach ($validation->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaunās Mājas: Ienākt</title>
    <link rel="icon" href="resources/img/fav.png" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="resources/css/login.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>
    <div class="cot">
        <div class="forms">
            <div class="form login">
                <span class="title">Ienākt</span>
                <img class="log2" src="resources/img/fav.png" alt="Company Logo">

                <form action="" method="post">
                    <div class="field">
                        <input type="text" name="username" id="username" autocomplete="off" placeholder="Lietotājvārds"
                            required>
                        <i class="uil uil-user icon"></i>
                    </div>

                    <div class="field">
                        <input type="password" class="password" name="password" id="password" autocomplete="off"
                            placeholder="Parole" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <lable for="remember">
                            <input type="checkbox" name="remember" id="remember"> Atcerēties mani
                        </lable>
                    </div>

                    <input type="hidden" name="token" value=<?php echo Token::generate(); ?>>
                    <div class="field button">
                        <input type="submit" value="Login">
                    </div>
                </form>
                <div class="login-signup">
                    <span class="text">Neesi vēl reģistrējies?
                        <a href="register.php" class="text signup-link">Reģistrēties</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <script src="resources/bootstrap.bundle.min.js"></script>
    <script src="resources/script.js"></script>
</body>

</html>