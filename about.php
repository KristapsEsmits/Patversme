<?php require_once 'core/init.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaunās Mājas: Par mums</title>
    <link rel="icon" href="resources/img/fav.png" />
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include 'includes/nav.php' ?>
    <div class="navmargin">
        <div class="container mt-5" data-aos="fade-up">
            <div class="row">
                <div style="height: 400px" class="col-lg-6 order-1 order-lg-2" data-aos="fade-left"
                    data-aos-delay="100">
                    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"
                                aria-current="true"></button>
                            <button type="button" data-bs-target="#carousel" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#carousel" data-bs-slide-to="2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div style="height: 400px;" class="carousel-item active">
                                <img class="cover" src="resources/img/dog.webp">
                            </div>
                            <div style="height: 400px;" class="carousel-item ">
                                <img class="cover" src="resources/img/cat3.webp">
                            </div>
                            <div style="height: 400px;" class="carousel-item">
                                <img class="cover" src="resources/img/dog2.webp">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right"
                    data-aos-delay="100">
                    <h3>Par mums</h3>
                    <p>
                        Biedrība “Jaunās mājas” tika izveidota 2023. gada 10. februārī.
                    </p>
                    <p>
                        Biedrība par saviem uzdevumiem ir noteikusi dzīvnieku tiesību aizsardzību, patversmju
                        uzturēšanu, sabiedrības
                        izglītošanu dzīvnieku aizsardzības un labturības jautājumos, kā arī likumdošanas sakārtošanā
                        Latvijā ar šiem jautājumiem saistītās jomās. Ikdienā tiek izskatīti neskaitāmi ziņojumi par
                        cilvēku cietsirdīgu izturēšanos pret dzīvniekiem Latvijā.
                    </p>
                    <p class="fst-italic">
                        Biedrības pamatuzdevumi ir:
                    <ul>
                        <li><i class="ri-check-double-line"></i> Bez pajumtes un aprūpes palikušo dzīvnieku glābšana
                            un
                            dzīvnieku patversmes “Labās mājas”
                            uzturēšana;</li>
                        <li><i class="ri-check-double-line"></i> Līdzdalība Latvijas normatīvo dokumentu izstrādē,
                            kas
                            saistīti ar dzīvnieku aizsardzības
                            nodrošinājumu,
                            un cietsirdības gadījumu pret dzīvniekiem izskatīšana;</li>
                        <li><i class="ri-check-double-line"></i> Sabiedrības informēšana un izglītošana par
                            dzīvnieku
                            labturības nosacījumiem.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php' ?>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
</body>

</html>