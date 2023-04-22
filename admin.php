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
$sql_adopted = "SELECT COUNT(*) as total_adopted FROM adopted";
$sql_planed_visits = "SELECT COUNT(*) as planed_visits FROM visit WHERE date >= CURDATE()";
$sql_past_visits = "SELECT COUNT(*) as past_visits FROM visit WHERE date < CURDATE()";

//Execute the queries
$result_animals = mysqli_query($con, $sql_animals);
$result_users = mysqli_query($con, $sql_users);
$result_visits = mysqli_query($con, $sql_visits);
$result_planed_visits = mysqli_query($con, $sql_planed_visits);
$result_past_visits = mysqli_query($con, $sql_past_visits);
$result_adopted = mysqli_query($con, $sql_adopted);

//Fetch the results
$row_animals = mysqli_fetch_assoc($result_animals);
$row_users = mysqli_fetch_assoc($result_users);
$row_visits = mysqli_fetch_assoc($result_visits);
$row_planed_visits = mysqli_fetch_assoc($result_planed_visits);
$row_past_visits = mysqli_fetch_assoc($result_past_visits);
$row_adopted = mysqli_fetch_assoc($result_adopted);

$animals = $row_animals["total_animals"];
$users = $row_users["total_users"];
$visits = $row_visits["total_visits"];
$planed_visits = $row_planed_visits["planed_visits"];
$past_visits = $row_past_visits["past_visits"];
$adopted = $row_adopted["total_adopted"];

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
    <div class="container">
        <div class="navmargin mid">
            <div class="content">
                <h2>Opcijas:</h2>
                <div class=" d-flex justify-content-center">
                    <button class="btn btn-primary mr-3 mb-2 atstarpenahuj"
                        onclick=" window.location.href='addanimals.php'">Pievienot
                        dzīvnieku</button>
                    <button class="btn btn-primary mr-3 mb-2 atstarpenahuj"
                        onclick=" window.location.href='animals.php'">Apskatīt
                        dzīvniekums</button>
                    <button class="btn btn-primary mr-3 mb-2 atstarpenahuj"
                        onclick=" window.location.href='users.php'">Apskatīt
                        lietotājus</button>
                    <button class="btn btn-primary mr-3 mb-2 atstarpenahuj"
                        onclick=" window.location.href='allVisits.php'">Apskatīt
                        vizītes</button>
                    <button class="btn btn-primary mr-3 mb-2" onclick=" window.location.href='final.php'">Dzīvnieka
                        adopcija</button>
                </div>
            </div>
            <div class="content">
                <div class="row rinda d-flex justify-content-center pt-4">
                    <h2 class="d-flex justify-content-center">Statistika</h2>
                    <div class="col-lg-4 mb-4">
                        <div class="card text-light text-center mx-auto">
                            <div class="card-body text-dark">
                                <h3 class="card-title py-2 text-center">Dzīvnieki</h3>
                                <p class="card-text" image.png>
                                    <?php echo "Patversmē kopā ir: " . $animals . " dzīvnieki"; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card text-light text-center mx-auto">
                            <div class="card-body text-dark">
                                <h3 class="card-title py-2 text-center">Lietotāji</h3>
                                <p class="card-text">
                                    <?php echo "Sistemā ir: " . $users . " reģistrēti lietotāji"; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card text-light text-center mx-auto">
                            <div class="card-body text-dark">
                                <h3 class="card-title py-2 text-center">Vizītes</h3>
                                <p class="card-text">
                                    <?php echo "Kopā ir bijušas: " . $visits . " vizītes"; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card text-light text-center mx-auto">
                            <div class="card-body text-dark">
                                <h3 class="card-title py-2 text-center">Gaidāmās vizītes</h3>
                                <p class="card-text">
                                    <?php echo "Pašlaik ir ieplānotas: " . $planed_visits . " vizītes"; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card text-light text-center mx-auto">
                            <div class="card-body text-dark">
                                <h3 class="card-title py-2 text-center">Gaidāmās vizītes</h3>
                                <p class="card-text">
                                    <?php echo "Patversmē ir bijušas: " . $past_visits . " vizītes"; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card text-light text-center mx-auto">
                            <div class="card-body text-dark">
                                <h3 class="card-title py-2 text-center">Mājas atraduši</h3>
                                <p class="card-text">
                                    <?php echo "Mājas atraduši: " . $adopted . " dzīvnieki"; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php' ?>
    <script src="resources/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>