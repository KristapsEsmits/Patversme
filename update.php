<?php
require_once 'core/init.php';

$user = new User();

if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}


if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check(
            $_POST,
            array(
                'name' => array(
                    'required' => true,
                    'min' => 3,
                    'max' => 50,
                    'no_numbers' => true
                ),
                'surname' => array(
                    'required' => true,
                    'min' => 3,
                    'max' => 50,
                    'no_numbers' => true
                ),
                'email' => array(
                    'required' => true,
                    'min' => 3,
                    'max' => 50,
                    'email' => true
                ),
                'phone' => array(
                    'required' => true,
                    'min' => 3,
                    'max' => 20,
                    'only_numbers' => true
                )
            )
        );
        if ($validation->passed()) {

            try {
                $user->update(
                    array(
                        'name' => Input::get('name'),
                        'surname' => Input::get('surname'),
                        'email' => Input::get('email'),
                        'phone' => Input::get('phone')
                    )
                );

                Session::flash('home', 'Profile details have been updated!');
                Redirect::to('index.php');
            } catch (Exception $e) {
                die($e->getMessage());
            }

        } else {
            foreach ($validation->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
?>

<form action="" method="post">
    <div class="field">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo escape($user->data()->name); ?>">
    </div>

    <div class="field">
        <label for="surname">Surname</label>
        <input type="text" name="surname" id="surname" value="<?php echo escape($user->data()->surname); ?>">
    </div>

    <div class="field">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?php echo escape($user->data()->email); ?>">
    </div>

    <div class="field">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="<?php echo escape($user->data()->phone); ?>">
    </div>

    <input type="submit" value="Change">
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
</form>