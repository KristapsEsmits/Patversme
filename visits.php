<?php
require_once 'core/init.php';

$user = new User();
$visit = new Visit();
$animals = new Animal();

if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}

include 'includes/databaseCon.php';

if (isset($_POST['delete-btn'])) {
    //Get the ID of the row to be deleted
    $visitID = $_POST['delete-btn'];
    //Delete the row from the database
    $sql = "DELETE FROM visit WHERE visitID = ? AND date >= CURDATE()";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $visitID);
    mysqli_stmt_execute($stmt);

    try {
        $animals->updateAnimal(
            $animalID = 34,
            array(
                'available' => 1
            )
        );
        Redirect::to('visits.php');
    } catch (Exception $e) {
        die($e->getMessage());
    }
}


$query = "SELECT * FROM visit WHERE id = " . $user->data()->id . " AND date >= CURDATE()";
$result1 = mysqli_query($con, $query);
$query2 = "SELECT * FROM visit WHERE id = " . $user->data()->id . " AND date < CURDATE()";
$result2 = mysqli_query($con, $query2);


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
    <div class="navmargin">
        <div class="content">
            <div class="container">
                <h2>Plānotās vizītes:</h2>
                <?php if (mysqli_num_rows($result1) == 0) {
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
                                <th scope="col">Dzīvnieks</th>
                                <th scope="col">Opcijas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM visit WHERE id = " . $user->data()->id . " AND date >= CURDATE()";
                            $result = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['date']; ?>
                                    </td>
                                    <td>
                                        <a href='animalprofile.php?animalID=<?php echo $row['animalID']; ?>'>Apskatīt</a>
                                    </td>
                                    <td>
                                        <form method="POST">
                                            <button type="submit" name="delete-btn"
                                                value="<?php echo $row['visitID']; ?>">Atteikt vizīti</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php } ?>
                <h2>Pagājušās vizītes:</h2>
                <?php
                if (mysqli_num_rows($result2) == 0) {
                    ?>
                    <div class="container text-center">
                        <h2 class="mb-4 mt-4">Neesat veicis nevienu vizīti!</h2>
                    </div>
                    <?php
                } else { ?>
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th scope="col">Datums</th>
                                <th scope="col">Dzīvnieks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM visit WHERE id = " . $user->data()->id . " AND date < CURDATE()";
                            $result = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['date']; ?>
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
    </div>
    <?php include 'includes/footer.php' ?>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
</body>

</html>