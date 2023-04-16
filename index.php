<?php include 'includes/logedin.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaunās Mājas</title>
    <link rel="icon" href="resources/img/fav.png" />
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="resources/css/style.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>
    <!------------->
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"
                aria-current="true"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="cover" src="resources/img/cat1.png">
                <div class="carousel-caption">
                    <h5>Lorem ipsum</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt
                        excepturi quas vero.</p>
                    <p><a href="#" class="btn btn-warning mt-3">Learn More</a></p>
                </div>
            </div>

            <div class="carousel-item">
                <img class="cover" src="resources/img/dog.webp">
                <div class="carousel-caption">
                    <h5>Lorem ipsum</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt
                        excepturi quas vero.</p>
                    <p><a href="#" class="btn btn-warning mt-3">Learn More</a></p>
                </div>
            </div>

            <div class="carousel-item">
                <img class="cover" src="resources/img/cat3.webp">
                <div class="carousel-caption">
                    <h5>Lorem ipsum</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt
                        excepturi quas vero.</p>
                    <p><a href="#" class="btn btn-warning mt-3">Learn More</a></p>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!------------->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="about-img">
                        <img src="resources/img/dog2.webp" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12 ps-lg-5">
                    <div class="about-text">
                        <h2>Par mums <br /> Mūsu stāsts:</h2>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam, labore reiciendis. Assumenda
                            eos quod animi! Soluta nesciunt inventore dolores excepturi provident, culpa beatae tempora,
                            explicabo corporis quibusdam corrupti. Autem, quaerat. Assumenda quo aliquam vel, nostrum
                            explicabo ipsum dolor, ipsa perferendis porro doloribus obcaecati placeat natus iste odio
                            est non earum?</p>
                        <a href="#" class="btn btn-warning">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2>Dzīvnieki adopcijai</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-light text-center bg-white pb-2">
                        <div class="card-body text-dark">
                            <div class="img-area mb-4">
                                <img src="resources/img/cat3.webp" class="img-fluid">
                            </div>
                            <h3 class="card-title">Lorem ipsum</h3>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eligendi
                                modi temporibus alias iste. Accusantium?</p>
                            <button class="btn bg-warning text-dark">vairāk</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-light text-center bg-white pb-2">
                        <div class="card-body text-dark">
                            <div class="img-area mb-4">
                                <img src="resources/img/cat3.webp" class="img-fluid">
                            </div>
                            <h3 class="card-title">Lorem ipsum</h3>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eligendi
                                modi temporibus alias iste. Accusantium?</p>
                            <button class="btn bg-warning text-dark">vairāk</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-light text-center bg-white pb-2">
                        <div class="card-body text-dark">
                            <div class="img-area mb-4">
                                <img src="resources/img/cat3.webp" class="img-fluid">
                            </div>
                            <h3 class="card-title">Lorem ipsum</h3>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eligendi
                                modi temporibus alias iste. Accusantium?</p>
                            <button class="btn bg-warning text-dark">vairāk</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2>Veiksmes stāsti</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="resources/img/dog4.jpg" class="round">
                            <h3 class="card-title py-2">Lorem ipsum</h3>
                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ipsam
                                nostrum illo tempora esse quibusdam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="resources/img/cat4.jpg" class="round">
                            <h3 class="card-title py-2">Lorem ipsum</h3>
                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ipsam
                                nostrum illo tempora esse quibusdam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="resources/img/dog3.webp" class="round">
                            <h3 class="card-title py-2">Lorem ipsum</h3>
                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ipsam
                                nostrum illo tempora esse quibusdam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="resources/img/kidcat.jpg" class="round">
                            <h3 class="card-title py-2">Lorem ipsum</h3>
                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ipsam
                                nostrum illo tempora esse quibusdam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------->
    <footer class="bg-dark p-2 text-center" id="footer">
        <div class="container">
            <p class="text-white">Info</p>
        </div>
    </footer>
    <script src="resources/bootstrap.bundle.min.js"></script>
    <script src="resources/script.js"></script>
</body>

</html>