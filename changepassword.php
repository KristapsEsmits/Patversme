<?php
require_once 'core/init.php';

$user = new User();

if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check(
            $_POST,
            array(
                'password_current' => array(
                    'required' => true,
                    'min' => 6
                ),
                'password_new' => array(
                    'required' => true,
                    'min' => 6
                ),
                'password_new_again' => array(
                    'required ' => true,
                    'min' => 6,
                    'matches' => 'password_new'
                )
            )
        );

        if ($validation->passed()) {

            if (Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password) {
                echo 'Your current password is wrong.';
            } else {
                $salt = Hash::salt(32);
                $user->update(
                    array(
                        'password' => Hash::make(Input::get('password_new'), $salt),
                        'salt' => $salt
                    )
                );
                Session::flash('home', 'Your password has been changed!');
                Redirect::to('index.php');
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
    <title>Jaunās Mājas: Paroles maiņa</title>
    <link rel="icon" href="resources/img/fav.png" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="resources/css/login.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>
    <div class="cot">
        <div class="forms3">
            <div class="form login">
                <span class="title">Paroles maiņa</span>
                <img class="log2" src="resources/img/fav.png" alt="Company Logo">
                <form action="" method="post">
                    <div class="field">
                        <input type="password" class="password" name="password_current" id="password_current"
                            placeholder="Pašreizējā parole" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="field">
                        <input type="password" name="password_new" id="password_new" placeholder="Jaunā parole"
                            required>
                        <i class="uil uil-lock icon"></i>
                    </div>

                    <div class="field">
                        <input type="password" name="password_new_again" id="password_new_again"
                            placeholder="Atkārtoti jaunā parole" required>
                        <i class="uil uil-lock icon"></i>
                    </div>

                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    <div class="field button">
                        <input type="submit" value="Mainīt">
                    </div>
                    <div class="field button">
                        <input type="button" value="Atcelt"
                            onclick="window.location.href='profile.php?user=<?php echo escape($user->data()->username); ?>';">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
    <script src="resources/js/script.js"></script>
</body>

</html>