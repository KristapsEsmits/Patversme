<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <div>
            <a href="index.php">
                <img class="logoimg" src="resources/img/fav.png" alt="Company Logo">
                <h2 class="logo">Jaunās<span>Mājas</span></h2>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto  mb-lg-0">
                <li><a class="nav-link" href="index.php">Sākums</a></li>
                <li><a class="nav-link" href="adopt.php">Adoptē</a></li>
                <li><a class="nav-link" href="about.php">Par mums</a></li>
                <li id="border"><a class="nav-link" href="contacts.php">Kontakti</a></li>
                <?php
                $user = new User();
                if ($user->isLoggedIn()) {
                    ?>
                    <li><a class="nav-link"
                            href="profile.php?user=<?php echo escape($user->data()->username); ?>">Profils</a></li>
                    <?php
                }
                ?>
                <?php
                if ($user->hasPermission('admin')) {
                    echo '<li><a class="nav-link" href="admin.php">Admin panelis</a></li>';
                }
                $user = new User();
                if ($user->isLoggedIn()) {
                    echo '<li><a class="nav-link" href="logout.php">Iziet</a></li>';
                } else {
                    echo '<li><a class="nav-link" href="login.php">Ienākt</a></li>
                              <li><a class="nav-link" href="register.php">Reģistrēties</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>