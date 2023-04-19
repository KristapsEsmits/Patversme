<?php
require_once 'core/init.php';

$user = new User();

if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}

include 'includes/databaseCon.php';

if (isset($_POST['delete-btn'])) {
    // Get the ID of the row to be deleted
    $visitID = $_POST['delete-btn'];
    // Delete the row from the database
    $sql = "DELETE FROM visit WHERE visitID = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $visitID);
    mysqli_stmt_execute($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaunās Mājas: Kontakti</title>
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
                                            value="<?php echo $row['visitID']; ?>">Ateikt vizīti</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <h2>Pagājušās vizītes:</h2>
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
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php' ?>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
</body>

</html>