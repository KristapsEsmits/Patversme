<?php
require_once 'core/init.php';
include 'includes/databaseCon.php';

$user = new User();

if (!$user->isLoggedIn() || !$user->hasPermission('admin')) {
    Redirect::to('index.php');
}

$sql_animals = "SELECT COUNT(*) as total_animals FROM animals";
$sql_users = "SELECT COUNT(*) as total_users FROM users";
$sql_visits = "SELECT COUNT(*) as total_visits FROM visit";
$sql_planed_visits = "SELECT COUNT(*) as planed_visits FROM visit WHERE date >= CURDATE()";
$sql_past_visits = "SELECT COUNT(*) as past_visits FROM visit WHERE date < CURDATE()";

//Execute the queries
$result_animals = mysqli_query($con, $sql_animals);
$result_users = mysqli_query($con, $sql_users);
$result_visits = mysqli_query($con, $sql_visits);
$result_planed_visits = mysqli_query($con, $sql_planed_visits);
$result_past_visits = mysqli_query($con, $sql_past_visits);

//Fetch the results
$row_animals = mysqli_fetch_assoc($result_animals);
$row_users = mysqli_fetch_assoc($result_users);
$row_visits = mysqli_fetch_assoc($result_visits);
$row_planed_visits = mysqli_fetch_assoc($result_planed_visits);
$row_past_visits = mysqli_fetch_assoc($result_past_visits);

$animals = $row_animals["total_animals"];
$users = $row_users["total_users"];
$visits = $row_visits["total_visits"];
$planed_visits = $row_planed_visits["planed_visits"];
$past_visits = $row_past_visits["past_visits"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaunās Mājas: Admin</title>
    <link rel="icon" href="resources/img/fav.png" />
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>
    <section class="navmargin">
        <button onclick="window.location.href='addanimals.php'">Pievienot dzīvnieku</button>
        <button onclick="window.location.href='animals.php'">Apskatīt dzīvniekums</button>
        <button onclick="window.location.href='users.php'">Apskatīt lietotājus</button>
        <button onclick="window.location.href='allVisits.php'">Apskatīt vizītes</button>
        <button onclick="window.location.href='final.php'">Dzīvnieka adopcija</button>
        <?php
        echo "Patversmē kopā ir: " . $animals . " dzīvnieki";
        echo "Sistemā ir: " . $users . " reģistrēti lietotāji";
        echo "Patversmē kopā ir bijušas: " . $visits . " vizītes";
        echo "Pašlaik ir ieplānotas: " . $planed_visits . " vizītes";
        echo "Patversmē ir bijušas: " . $past_visits . " vizītes";
        ?>
    </section>
    <?php include 'includes/footer.php' ?>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
</body>

</html>