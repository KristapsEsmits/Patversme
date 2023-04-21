<?php
require_once 'core/init.php';
include 'includes/databaseCon.php';

//Retrieve the animalID parameter from the URL
$animalID = isset($_GET['animalID']) ? $_GET['animalID'] : null;
$user = new User();
$animals = new Animal();

//Retrieve the userID parameter

if ($user->isLoggedIn()) {
    $user = new User();
    $userID = $user->data()->id;
}

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check(
            $_POST,
            array(
                'date' => array(
                    'required' => true,
                ),
                'id' => array(
                ),
                'animalID' => array(
                    'required' => true,
                )
            )
        );

        if ($validation->passed()) {
            $visit = new Visit;
            try {
                $visit->create(
                    array(
                        'date' => Input::get('date'),
                        'id' => $userID,
                        'animalID' => $animalID
                    )
                );
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        try {
            $animals->updateAnimal(
                $animalID,
                array(
                    'available' => 0
                )
            );
            Redirect::to('visits.php');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
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
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
    <?php include 'includes/nav.php';

    //Get the animal details from the database using the animalID
    $db = DB::getInstance();
    $animal = $db->query("SELECT * FROM animals WHERE animalID = ?", array($animalID))->results()[0];

    if (!$animal) {
        Redirect::to('adopt.php');
    } else {
        ?>
        <div class="navmargin">
            <div class="col-lg-3 m-auto pb-5 pt-4">
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
                            <?php echo ($animal->chip == 0) ? 'Nē' : $animal->chip; ?>
                        </p>
                        <p><strong>Čipa numurs:</strong>
                            <?php echo ($animal->chipNumber == 0) ? '-' : $animal->chipNumber; ?>
                        </p>
                        <p><strong>Apraksts:</strong>
                            <?php echo $animal->description; ?>
                        </p>
                        <?php if ($user->isLoggedIn() && empty($result) && $animal->available == 1) { ?>
                            <button class="btn bg-warning text-dark" onclick="showForm()">Pieteikt vizīti</button>
                        <?php } else { ?>
                            <p><strong>Info: </strong>Pie dzīvnieka pašlaik nevar pieteikt vizīti</p>
                            <?php
                        } ?>
                    </div>
                </div>
            </div>
            <form id="form" style="display: none;" action="" method="post">
                <input type="hidden" name="animalID" value="<?php echo escape($animal->animalID); ?>">
                <label for="date">Izvēlieties datumu:</label>
                <input type="date" id="date" name="date" required min="<?php echo date('Y-m-d'); ?>"
                    max="<?php echo date('Y-m-d', strtotime('+5 days')); ?>">
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <div class="field button">
                    <input type="submit" value="Pieteikt vizīti">
                </div>
            </form>
        </div>
        <?php
    }
    ?>
    <?php include 'includes/footer.php' ?>
    <script src="resources/js/script.js"></script>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
</body>

</html>