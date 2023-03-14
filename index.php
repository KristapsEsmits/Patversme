<?php
require_once 'core/init.php';

if (Session::exists('home')) {
    echo '<p>' . Session::flash('home') . '<p>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaunās Mājas</title>
    <link rel="icon" href="resources/img/fav.png" />
    <link rel="stylesheet" href="resources/css/index.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css%22%3E
</head>
<body>
    <div class=" hero-img">
    </div>
    <div class="wrapper"></div>
    <section class="hero">
        <nav>
            <div>
                <img class="logoimg" src="resources/img/fav.png" alt="Company Logo">
                <h2 class="logo">Jaunās<span>Mājas</span></h2>
            </div>
            <ul>
                <li><a href="#">Sākums</a></li>
                <li><a href="#">Adoptēt</a></li>
                <li><a href="#">Sākums</a></li>
                <li><a href="#">Sākums</a></li>
                <li><a href="#">Kontakti</a></li>
                <button class="sign">Ienākt</button>
            </ul>
        </nav>
    </section>
    <section class="footer">

    </section>
    </body>

</html>