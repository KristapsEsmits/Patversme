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
                'name' => array(
                    'required' => true,
                    'min' => 3,
                    'max' => 50,
                    'no_numbers' => true
                ),
                'surname' => array(
                    'required' => true,
                    'min' => 3,
                    'max' => 50,
                    'no_numbers' => true
                ),
                'email' => array(
                    'required' => true,
                    'min' => 3,
                    'max' => 50,
                    'email' => true
                ),
                'phone' => array(
                    'required' => true,
                    'min' => 3,
                    'max' => 20,
                    'only_numbers' => true
                )
            )
        );
        if ($validation->passed()) {

            try {
                $user->update(
                    array(
                        'name' => Input::get('name'),
                        'surname' => Input::get('surname'),
                        'email' => Input::get('email'),
                        'phone' => Input::get('phone')
                    )
                );

                Session::flash('home', 'Profile details have been updated!');
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaunās Mājas:: Profila dati</title>
    <link rel="icon" href="resources/img/fav.png" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="resources/css/login.css">
</head>

<body>
    <div class="container">
        <div class="forms3">
            <div class="form login">
                <span class="title">Profila dati</span>
                <img class="logoimg" src="resources/img/fav.png" alt="Company Logo">

                <form action="" method="post">
                    <div class="field">
                        <input type="text" name="name" id="name" value="<?php echo escape($user->data()->name); ?>"
                            placeholder="Name" required>
                        <i class="uil uil-user icon"></i>
                    </div>

                    <div class="field">
                        <input type="text" name="surname" id="surname"
                            value="<?php echo escape($user->data()->surname); ?>" placeholder="Uzvārds" required>
                        <i class="uil uil-user icon"></i>
                    </div>

                    <div class="field">
                        <input type="text" name="email" id="email" value="<?php echo escape($user->data()->email); ?>"
                            placeholder="E-pasts" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>

                    <div class="field">
                        <input type="text" name="phone" id="phone" value="<?php echo escape($user->data()->phone); ?>"
                            placeholder="Telefona numurs" required>
                        <i class="uil uil-phone icon"></i>
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
    <script src="resources/script.js"></script>
</body>

</html>