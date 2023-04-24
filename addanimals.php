<?php
require_once 'core/init.php';

$user = new User();

if (!$user->isLoggedIn() || !$user->hasPermission('admin')) {
    Redirect::to('index.php');
}

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check(
            array_merge($_POST, $_FILES),
            array(
                'name' => array(
                    'required' => true,
                    'no_numbers' => true
                ),
                'age' => array(
                    'required' => true,
                    'numeric' => true
                ),
                'type' => array(
                    'valid_select' => array(
                        'required' => true,
                        'in_array' => array('kaķis', 'suns', 'cits')
                    )
                ),
                'picture' => array(
                    'picture' => true
                ),
                'chip' => array(),
                'chipNumber' => array(),
                'description' => array(
                    'required' => true
                ),
            )
        );

        if ($validation->passed()) {
            //Gives access to database
            $animals = new Animal();
            $chip = Input::get('chip') ? true : false;

            //process file upload
            $picture = '';
            if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
                $target_dir = "uploads/";
                $file_name = basename($_FILES["picture"]["name"]);
                $target_file = $target_dir . $file_name;
                $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                $upload_ok = move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
                if ($upload_ok) {
                    $picture = $target_file;
                } else {
                    die("File upload failed");
                }
            }

            try {
                $animals->create(
                    array(
                        'name' => Input::get('name'),
                        'age' => Input::get('age'),
                        'type' => Input::get('type'),
                        'picture' => $picture,
                        'chip' => $chip,
                        'chipNumber' => Input::get('chipNumber'),
                        'description' => Input::get('description'),
                    )
                );
                Redirect::to('admin.php');
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaunās Mājas:: Pievienot dzīvnieku</title>
    <link rel="icon" href="resources/img/fav.png" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="resources/css/login.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>
    <div class="cot">
        <div class="forms2">
            <div class="form login">
                <span class="title">Pievienot dzīvnieku</span>
                <img class="log2" src="resources/img/fav.png" alt="Company Logo">

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="field">
                        <input type="text" name="name" id="name" autocomplete="off" placeholder="Dzīvnieka vārds"
                            required>
                        <i class="uil uil-font icon"></i>
                    </div>

                    <div class="field">
                        <input type="text" name="age" id="age" autocomplete="off" placeholder="Vecums" required>
                        <i class="uil uil-0-plus icon"></i>
                    </div>

                    <div class="field">
                        <div class="field">
                            <select name="type" id="type" placeholder="Tips">
                                <option value="kaķis">kaķis</option>
                                <option value="suns">suns</option>
                                <option value="cits">cits</option>
                            </select>
                        </div>
                    </div>

                    <div class="field">
                        <input type="file" name="picture" id="picture" placeholder="Bilde"
                            accept="image/png, image/gif, image/jpeg, image/webp" required>
                        <i class="uil uil-images  icon"></i>
                    </div>

                    <div class="field">
                        <input type="text" name="description" id="description" autocomplete="off" placeholder="Apraksts"
                            required>
                        <i class="uil uil-font icon"></i>
                    </div>

                    <div class="field">
                        <label for="chip">Vai ir čipots?</label>
                        <input type="checkbox" name="chip" id="chip" onclick="toggleChipNumber()">
                    </div>

                    <div class="field" id="chipNumberField" style="display:none;">
                        <input type="text" name="chipNumber" id="chipNumber" autocomplete="off"
                            placeholder="Čipa numurs">
                        <i class="uil uil-circuit icon"></i>
                    </div>


                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    <div class="field button">
                        <input type="submit" value="Pievienot">
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="resources/js/script.js"></script>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
</body>

</html>