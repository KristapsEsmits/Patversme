<?php
require_once 'core/init.php';

$user = new User();

if ($username = Input::get('user')) {
    $profileUser = new User($username);
    if ($profileUser->exists()) {
        $data = $profileUser->data();
        if ($user->isLoggedIn() && $user->data()->id == $data->id) {
            ?>
            <h3>
                <?php echo escape($data->username); ?>
            </h3>
            <p>Name:
                <?php echo escape($data->name); ?>
            </P>
            <p>Surname:
                <?php echo escape($data->surname); ?>
            </P>
            <p>E-mail:
                <?php echo escape($data->email); ?>
            </P>
            <p>Phone Number:
                <?php echo escape($data->phone); ?>
            </P>
            <li><a href="changepassword.php">Change password</a></li>
            <?php
        } else {
            Redirect::to(402);
        }
    }
}