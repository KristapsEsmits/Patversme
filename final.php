<?php
require_once 'core/init.php';
include 'includes/databaseCon.php';

$animals = new Animal();
$user = new User();

if (!$user->isLoggedIn() || !$user->hasPermission('admin')) {
    Redirect::to('index.php');
}

if (Input::exists()) {
    $userID = Input::get('userID');
    $animalID = Input::get('animalID');

    $adopted = new Adopted;
    try {
        $adopted->create(
            array(
                'userID' => $userID,
                'animalID' => $animalID
            )
        );
    } catch (Exception $e) {
        die($e->getMessage());
    }
    try {
        $animals->updateAnimal(
            $animalID,
            array(
                'available' => 3
            )
        );
        Redirect::to('index.php');
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaunās Mājas: Adopcija</title>
    <link rel="icon" href="resources/img/fav.png" />
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>
            <div class="container">
                <h2 class="mb-5">Dzīvnieka adopcija</h2>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="userID">Lietotājs:</label>
                        <select class="form-control" id="userID" name="userID">
                            <?php
                            $query = "SELECT * FROM users";
                            $result = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?>     <?php echo $row['surname']; ?> (+371-<?php echo $row['phone']; ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="animalID">Dzīvnieks:</label>
                        <select class="form-control" id="animalID" name="animalID">
                            <?php
                            $query = "SELECT * FROM animals";
                            $result = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row['animalID']; ?>"><?php echo $row['animalID']; ?>. <?php echo $row['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Veikt adopciju</button>
                </form>
            </div>
        </div>
    </section>
    <?php include 'includes/footer.php' ?>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
</body>

</html>