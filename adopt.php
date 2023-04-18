<?php require_once 'core/init.php'; ?>

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

    <div class="container my-4 p-3">
        <div class="navmargin">
            <form action="" method="get" class="d-flex flex-column align-items-center">
                <div class="form-group d-flex flex-row w-100 justify-content-center">
                    <div class="form-group w-25">
                        <label for="type">Tips:</label>
                        <select class="form-control" name="type" id="type" data-name="type">
                            <option value="">Visi</option>
                            <option value="suns">Suņi</option>
                            <option value="kaķis">Kaķi</option>
                            <option value="cits">Citi dzīvnieki</option>
                        </select>
                    </div>
                    <div class="form-group ms-3 w-25">
                        <label for="age">Vecums:</label>
                        <select class="form-control" name="age" id="age" data-name="age">
                            <option value="">Visi</option>
                            <option value="<1">No 0 līdz 1</option>
                            <option value=">=1 AND age <=5">No 1 līdz 5 gadi</option>
                            <option value=">5">Vairāk nekā 5 gadi</option>
                        </select>
                    </div>
                    <div class="form-group ms-3 w-25">
                        <label for="availability">Pieejamība:</label>
                        <select class="form-control" name="availability" id="availability" data-name="availability">
                            <option value="">Visi</option>
                            <option value="available">Pieejami</option>
                            <option value="not_available">Nepieejami</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 mb-3 ms-3">Filtrēt</button>
            </form>
            <div class="col-12 col-md-10 mx-auto">
                <div class="row">
                    <?php
                    $db = DB::getInstance();
                    $query = "SELECT * FROM animals WHERE 1=1";
                    if (isset($_GET['type']) && !empty($_GET['type'])) {
                        $query .= " AND type='" . $_GET['type'] . "'";
                    }
                    if (isset($_GET['age']) && !empty($_GET['age'])) {
                        $query .= " AND age" . urldecode($_GET['age']);
                    }
                    if (isset($_GET['availability']) && !empty($_GET['availability'])) {
                        if ($_GET['availability'] == 'available') {
                            $query .= " AND available=1";
                        } else {
                            $query .= " AND available=0";
                        }
                    }
                    //Loop through the animals and display their information
                    $animals = $db->query($query)->results();
                    foreach ($animals as $animal) {
                        ?>
                        <div class="col-lg-3 mb-4">
                            <div class="card text-light text-center mx-auto">
                                <div class="card-body text-dark">
                                    <div class="img-area mb-4">
                                        <img src="<?php echo $animal->picture; ?>" alt="<?php echo $animal->name; ?>"
                                            width="220" height="150" style="object-fit: cover; width: 100%;">
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
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php' ?>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
    <script src="resources/js/script.js"></script>
</body>

</html>