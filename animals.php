<?php
require_once 'core/init.php';

$animals = new Animal();
$user = new User();

if (!$user->isLoggedIn() || !$user->hasPermission('admin')) {
    Redirect::to('index.php');
}

include 'includes/databaseCon.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaunās Mājas: Dzīvnieki</title>
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
            <h2 class="mb-5">Dzīvnieki</h2>
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th scope="col">
                            <label class="control control--checkbox">
                                <input type="checkbox" class="js-check-all" />
                                <div class="control__indicator"></div>
                            </label>
                        </th>
                        <th scope="col">ID</th>
                        <th scope="col">Vārds</th>
                        <th scope="col">Vecums</th>
                        <th scope="col">Tips</th>
                        <th scope="col">Bilde</th>
                        <th scope="col">Čips</th>
                        <th scope="col">Čipa nr</th>
                        <th scope="col">Apraksts</th>
                        <th scope="col">Ieplānota vizīte</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM animals";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <th scope="row">
                                <label class="control control--checkbox">
                                    <input type="checkbox" />
                                    <div class="control__indicator"></div>
                                </label>
                            </th>
                            <td>
                                <?php echo $row['animalID']; ?>
                            </td>
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                            <td>
                                <?php echo $row['age']; ?>
                            </td>
                            <td>
                                <?php echo $row['type']; ?>
                            </td>
                            <td>
                                <a href="<?php echo $row['picture']; ?>">Apskatīt</a>
                            </td>
                            <td>
                                <?php echo ($row['chip'] == 0) ? 'Nē' : $row['chip']; ?>
                            </td>
                            <td>
                                <?php echo ($row['chipNumber'] == 0) ? '-' : $row['chipNumber']; ?>
                            </td>
                            <td class="description-cell">
                                <?php echo $row['description']; ?>
                            </td>
                            <td>
                                <?php echo $row['available'] == 1 ? 'Nē' : ($row['available'] == 0 ? 'Jā' : $row['available']) ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include 'includes/footer.php' ?>
    <script src="resources/js/jquery-3.3.1.min.js"></script>
    <script src="resources/js/main.js"></script>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
</body>

</html>