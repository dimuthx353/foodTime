<?php
require_once("./db.inc.php");
require_once("./function.inc.php");


if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $pwd2 = $_POST["con_password"];

    $emptyInput = emptyInputSignup($username, $email, $pwd, $pwd2);
    $invalidUsername = invalidUid($username);
    $invalidEmail = invalidEmail($email);
    $pwdMatch = pwdMatch($pwd, $pwd2);
    $uidExists = uidExists($conn, $username, $email);


    if ($emptyInput !== false) {
        header("Location:../signup.php?error=emptyinputs");
        exit();
    }

    if ($invalidUsername !== false) {
        header("Location:../signup.php?error=invalidUsername");
        exit();
    }

    if ($invalidEmail !== false) {
        header("Location:../signup.php?error=invalidEmail");
        exit();
    }

    if ($pwdMatch !== false) {
        header("Location:../signup.php?error=pwdMatch");
        exit();
    }

    if ($uidExists !== false) {
        header("Location:../signup.php?error=uidExists");
        exit();
    }

    createUser($conn,$username, $email, $pwd);
} else {
    header("Location:../signup.php");
    exit();
}

