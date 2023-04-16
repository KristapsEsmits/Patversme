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
                'username' => array(
                    'required' => true,
                    'min' => 3,
                    'max' => 20,
                    'unique' => 'users',
                    'not_only_numbers' => true
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

                Session::flash('home', 'Reģistrācija veiksmīgi pabeigta!');
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
    <title>Jaunās Mājas: Reģistrēties</title>
    <link rel="icon" href="resources/img/fav.png" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="resources/css/login.css">
</head>
</head>

<body>
    <?php include 'includes/nav.php'; ?>
    <div class="cot">
        <div class="forms2">
            <div class="form login">
                <span class="title">Reģistrēties</span>
                <img class="log2" src="resources/img/fav.png" alt="Company Logo">

                <form action="" method="post">
                    <div class="field">
                        <input type="text" name="username" id="username" autocomplete="off" placeholder="Lietotājvārds"
                            required>
                        <i class="uil uil-user icon"></i>
                    </div>

                    <div class="field">
                        <input type="password" class="password" name="password" id="password" placeholder="Parole"
                            required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="field">
                        <input type="password" name="password_again" id="password_again" value=""
                            placeholder="Parole atkārtoti" required>
                        <i class="uil uil-lock icon"></i>
                    </div>

                    <div class="field">
                        <input type="text" name="name" id="name" placeholder="Vārds" required>
                        <i class="uil uil-user icon"></i>
                    </div>

                    <div class="field">
                        <input type="text" name="surname" id="surname" placeholder="Uzvārds" required>
                        <i class="uil uil-user icon"></i>
                    </div>

                    <div class="field">
                        <input type="text" name="email" id="email" placeholder="E-pasts" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>

                    <div class="field">
                        <input type="text" name="phone" id="phone" placeholder="Telefona numurs" required>
                        <i class="uil uil-phone icon"></i>
                    </div>

                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    <div class="field button">
                        <input type="submit" value="Reģistrēties">
                    </div>

                </form>

                <div class="login-signup">
                    <span class="text">Esi jau reģistrējies?
                        <a href="login.php" class="text signup-link">Ienākt</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <script src="resources/bootstrap.bundle.min.js"></script>
    <script src="resources/script.js"></script>
</body>

</html>