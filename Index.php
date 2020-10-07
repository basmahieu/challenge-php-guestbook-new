<?php

declare(strict_types=1);

require('Model/Validator.php');



// Input
if (isset($_POST['submit'])) {

    // validate entries
    $validation = new UserValidator($_POST);
    $errors = $validation->validateForm();

    // No errors save to DB here
}





// HTML
require('View/Main.php');
