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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>

    <div class="row">
        <?php
        $db = DB::getInstance();
        $animals = $db->query("SELECT * FROM animals")->results();

        // Loop through the animals and display their information
        foreach ($animals as $animal) {
            ?>
            <div class="col-10 col-md-10 col-lg-2">
                <div class="card text-light text-center bg-white pb-2">
                    <div class="card-body text-dark">
                        <div class="img-area mb-4">
                            <img src="<?php echo $animal->picture; ?>" alt="<?php echo $animal->name; ?>" width="250"
                                height="150">
                        </div>
                        <h3 class="card-title">
                            <?php echo $animal->name; ?>
                        </h3>
                        <button class="btn bg-warning text-dark"
                            onclick="window.location.href='animalprofile.php?animalID=<?php echo escape($animal->animalID); ?>'">Vairāk</button>


                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php include 'includes/footer.php' ?>
    <script src="resources/bootstrap.bundle.min.js"></script>
</body>

</html>