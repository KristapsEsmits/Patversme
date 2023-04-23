<?php require_once 'core/init.php'; ?>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>
    <div class="navmargin">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <h3 class="text-center">Sazinies ar mums</h3>
                <p class="text-center">
                    Dzīvnieku patversme "Jaunās mājas"
                </p>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card-deck">
                        <div class="card text-light text-center bg-white mb-3">
                            <div class="mt-3 text-dark">
                                <div class="img-area mb-3">
                                    <i class="fa fa-phone fa-3x"></i>
                                </div>
                                <h3 class="card-title">Piezvani mums</h3>
                                <p class="lead">+371 26617636 </p>
                            </div>
                        </div>
                        <div class="card text-light text-center bg-white mb-3">
                            <div class="mt-3 text-dark">
                                <div class="img-area mb-3">
                                    <i class="fa fa-map fa-3x"></i>
                                </div>
                                <h3 class="card-title">Brauc ciemos</h3>
                                <p class="lead">Mežapurva iela 2, Rīga</p>
                            </div>
                        </div>
                        <div class="card text-light text-center bg-white">
                            <div class="mt-3 text-dark">
                                <div class="img-area mb-3">
                                    <i class="fa fa-inbox fa-3x"></i>
                                </div>
                                <h3 class="card-title">Nosūti mums ziņu </h3>
                                <p class="lead">info@patversme.lv</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-8">
                    <iframe loading="lazy"
                        src="https://maps.google.com/maps?q=Me%C5%BEapurva%20iela%202%2C%20R%C4%ABga%2C%20LV-1064&amp;t=m&amp;z=15&amp;output=embed&amp;iwloc=near"
                        title="Mežapurva iela 2, Rīga, LV-1064" aria-label="Mežapurva iela 2, Rīga, LV-1064"
                        style="height: 540px; width: 100%"></iframe>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php' ?>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
</body>

</html>