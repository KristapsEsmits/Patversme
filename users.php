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
    <title>Jaunās Mājas: Kontakti</title>
    <link rel="icon" href="resources/img/fav.png" />
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="resources/css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>
    <div class="content">
        <div class="container">
            <h2 class="mb-5">Lietotāji</h2>
            <div class="table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th scope="col">
                                <label class="control control--checkbox">
                                    <input type="checkbox" class="js-check-all" />
                                    <div class="control__indicator"></div>
                                </label>
                            </th>
                            <th scope="col">ID</th>
                            <th scope="col">Lietoājvārds</th>
                            <th scope="col">Vārds</th>
                            <th scope="col">Uzvārds</th>
                            <th scope="col">E-pasts</th>
                            <th scope="col">Tel-nr</th>
                            <th scope="col">Grupa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <label class="control control--checkbox">
                                    <input type="checkbox" />
                                    <div class="control__indicator"></div>
                                </label>
                            </th>
                            <td>1392</td>
                            <td>James Yates</td>
                            <td>Web Designer</td>
                            <td>+63 983 0962 971</td>
                            <td>NY University</td>
                            <td>NY University</td>
                            <td>NY University</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="resources/js/jquery-3.3.1.min.js"></script>
    <script src="resources/js/main.js"></script>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
    <?php include 'includes/footer.php' ?>
</body>

</html>