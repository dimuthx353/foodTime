<?php
function emptyInputSignup($username, $email, $pwd, $pwd2)
{
    $result = null;

    if (empty($username) || empty($email) || empty($pwd) || empty($pwd2)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidUid($username)
{
    $result = null;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result = null;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function  pwdMatch($pwd, $pwd2)
{
    $result = null;

    if ($pwd !== $pwd2) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email)
{
    $sql = "SELECT * FROM registration WHERE username = ? OR email=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location:../../signup/index.php?error=stmtfaileduid');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt);
        return $row['id'];
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function createUser($conn, $username, $email, $pwd)
{
    $sql = "INSERT INTO registration (userName,email,password) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location:../signup.php?error=stmtfailedcre');
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header('Location:../signin.php?logon=true');
    exit();
}

function emptyInputLogin($email, $pwd)
{
    $result = null;

    if (empty($email) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function loginUser($conn, $email, $pwd)
{
    // Fetch user data from the database based on the provided email
    $sql = "SELECT * FROM registration WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signin.php?error=sqlerror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Verify the password
        $pwdHashed = $row['password'];
        if (password_verify($pwd, $pwdHashed)) {
            // Password matches, start session and set session variables
            session_start();
            $_SESSION["uid"] = $row["uid"];
            $_SESSION["username"] = $row["userName"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["status"] = $row["status"];

            if ($row["status"] == 1) {
                header("Location: ../index.php?admin=true");
                exit();
            } else {
                header("Location: ../index.php?admin=false");
                exit();
            }
        } else {
            // Password does not match
            header("Location: ../signin.php?error=wrongpassword");
            exit();
        }
    } else {
        // User with the provided email does not exist
        header("Location: ../signin.php?error=nouser");
        exit();
    }
}


function createItem($conn, $itemName, $category, $price, $description, $imgSrc)
{
    $sql = "INSERT INTO items (itemName,category,price,description,imgSrc) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location:../../signup/index.php?error=stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssiss", $itemName, $category, $price, $description, $imgSrc);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header('Location:../../admin.php?item=success');
    exit();
}
