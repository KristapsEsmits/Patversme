<?php include 'includes/logedin.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaunās Mājas: Adoptēt</title>
    <link rel="icon" href="resources/img/fav.png" />
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="resources/css/style.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>

    <div id="box" class="row">
        <?php
        $db = DB::getInstance();
        $animals = $db->query("SELECT * FROM animals")->results();

        // Loop through the animals and display their information
        foreach ($animals as $animal) {
            ?>
            <div id="box" class="col-10 col-md-10 col-lg-2">
                <div class="card text-light text-center bg-white pb-2">
                    <div class="card-body text-dark">
                        <div class="img-area mb-4">
                            <img src="<?php echo $animal->picture; ?>" alt="<?php echo $animal->name; ?>" width="300"
                                height="200">
                        </div>
                        <h3 class="card-title">
                            <?php echo $animal->name; ?>
                        </h3>
                        <a href="animalprofile.php?id=<?php echo escape($animal->animalID); ?>">
                            <button class="btn bg-warning text-dark">vairāk</button>
                        </a>

                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</body>

</html>