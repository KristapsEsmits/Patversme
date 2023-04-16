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
    <?php
    require_once 'core/init.php';

    $user = new User();

    if ($username = Input::get('user')) {
        $profileUser = new User($username);
        if ($profileUser->exists()) {
            $data = $profileUser->data();
            if ($user->isLoggedIn() && $user->data()->id == $data->id) {
                ?>
                <div class="container">
                    <div class="forms">
                        <div class="form login">
                            <h3 class="title">
                                <?php echo escape($data->username); ?>
                            </h3>
                            <img class="logoimg" src="resources/img/fav.png" alt="Company Logo">
                            <p class="padding">Vārds:
                                <?php echo escape($data->name); ?>
                            </P>
                            <p class="padding">Uzvārds:
                                <?php echo escape($data->surname); ?>
                            </P>
                            <p class="padding">E-pasts:
                                <?php echo escape($data->email); ?>
                            </P>
                            <p class="padding">Telefona numurs:
                                <?php echo escape($data->phone); ?>
                            </P>
                            <div class="field button">
                                <a href="update.php">
                                    <input type="button" value="Atjaunot informāciju">
                                </a>
                            </div>
                            <div class="field button">
                                <a href="changepassword.php">
                                    <input type="button" value="Mainīt paroli">
                                </a>
                            </div>
                            <?php
            } else {
                Redirect::to(402);
            }
        }
    }