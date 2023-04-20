<?php
require_once 'core/init.php';

$user = new User();

if (!$user->isLoggedIn() || !$user->hasPermission('admin')) {
    Redirect::to('index.php');
}

include 'includes/databaseCon.php';

$query = "SELECT * FROM visit WHERE date >= CURDATE()";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaunās Mājas: Vizītes</title>
    <link rel="icon" href="resources/img/fav.png" />
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="resources/css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>
    <div class="content">
        <div class="container">
            <h2>Plānotās vizītes:</h2>
            <?php
            if (mysqli_num_rows($result) == 0) {
                ?>
                <div class="container text-center">
                    <h2 class="mb-4 mt-4">Nav ieplānota neviena vizīte!</h2>
                </div>
                <?php
            } else { ?>
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th scope="col">Datums</th>
                            <th scope="col">Vārds</th>
                            <th scope="col">Uzvārds</th>
                            <th scope="col">Tel nr</th>
                            <th scope="col">epasts</th>
                            <th scope="col">Dzīvnieks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT visit.*, users.* 
                              FROM visit 
                              JOIN users ON visit.id = users.id 
                              WHERE visit.date >= CURDATE()";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['date']; ?>
                                </td>
                                <td>
                                    <?php echo $row['name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['surname']; ?>
                                </td>
                                <td>
                                    <?php echo $row['phone']; ?>
                                </td>
                                <td>
                                    <?php echo $row['email']; ?>
                                </td>
                                <td>
                                    <a href='animalprofile.php?animalID=<?php echo $row['animalID']; ?>'>Apskatīt</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
    <script src="resources/js/jquery-3.3.1.min.js"></script>
    <script src="resources/js/main.js"></script>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
    <?php include 'includes/footer.php' ?>
</body>

</html>