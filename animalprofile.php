<?php
include 'includes/logedin.php';
require_once 'core/init.php';
?>

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
    <?php include 'includes/nav.php';
    // Retrieve the animalID parameter from the URL
    $animalID = isset($_GET['animalID']) ? $_GET['animalID'] : null;

    if (!$animalID) {
        echo "Animal not found.";
    } else {
        // Get the animal details from the database using the animalID
        $db = DB::getInstance();
        $animal = $db->query("SELECT * FROM animals WHERE animalID = ?", array($animalID))->results()[0];

        if (!$animal) {
            echo "Animal not found.";
        } else {
            ?>
            <div class="navmargin">
                <div class="col-lg-3 m-auto">
                    <div class="card text-light">
                        <div class="card-body text-dark">
                            <h3 class="card-title">
                                <?php echo $animal->name; ?>
                            </h3>
                            <div class="img-area mb-4">
                                <img src="<?php echo $animal->picture; ?>" alt="<?php echo $animal->name; ?>" width="300"
                                    style="object-fit: cover; width: 100%;">
                            </div>
                            <p><strong>Vecums:</strong>
                                <?php echo $animal->age; ?>
                            </p>
                            <p><strong>Kāds dzīvnieks šis ir:</strong>
                                <?php echo $animal->type; ?>
                            </p>
                            <p><strong>Vai ir čipēts:</strong>
                                <?php echo $animal->chip; ?>
                            </p>
                            <p><strong>Čipa numurs:</strong>
                                <?php echo $animal->chipNumber; ?>
                            </p>
                            <p><strong>Apraksts:</strong>
                                <?php echo $animal->description; ?>
                            </p>
                            <button class="btn bg-warning text-dark"
                                onclick="window.location.href='animalprofile.php?animalID=<?php echo escape($animal->animalID); ?>'">Vairāk</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
</body>

</html>