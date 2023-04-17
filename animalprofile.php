<?php include 'includes/logedin.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaunās Mājas: Dzīvnieks</title>
    <link rel="icon" href="resources/img/fav.png" />
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="resources/css/style.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>

    <?php
    require_once 'core/init.php';

    // Retrieve the animalID parameter from the URL when the "Vairāk" button is clicked
    $animalID = isset($_GET['animalID']) ? $_GET['animalID'] : null;

    if (!$animalID) {
        // If no animalID is provided, display an error message
        echo "Animal not found.";
    } else {
        // Get the animal details from the database using the animalID
        $db = DB::getInstance();
        $animal = $db->query("SELECT * FROM animals WHERE animalID = ?", array($animalID))->results()[0];

        // Check if the animal exists
        if (!$animal) {
            // Animal doesn't exist, display an error message
            echo "Animal not found.";
        } else {
            // Animal exists, display its details
            ?>
            <div class="animal">
                <h3>
                    <?php echo $animal->name; ?>
                </h3>
                <img src="<?php echo $animal->image; ?>" alt="<?php echo $animal->name; ?>" width="128" height="128">
                <p>Vecums:
                    <?php echo $animal->age; ?>
                </p>
                <p>Apakštips:
                    <?php echo $animal->type; ?>
                </p>
                <img src="<?php echo $animal->picture; ?>" alt="<?php echo $animal->name; ?>">
                <p>Vai ir čipēts:
                    <?php echo $animal->chip; ?>
                </p>
                <p>Čipa numurs:
                    <?php echo $animal->chipNumber; ?>
                </p>
            </div>
            <?php
        }
    }
    ?>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
</body>

</html>