<?php
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $pwd = $_POST["password"];

    require_once("./db.inc.php");
    require_once("./function.inc.php");



    if (emptyInputLogin($email, $pwd) !== false) {
        header("Location: ../signin.php?error=emptyinputsss");
        exit();
    }

    loginUser($conn, $email, $pwd);
} else {
    header("Location:../signin.php");
    exit();
}