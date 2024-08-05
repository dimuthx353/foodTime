<?php
include "./includes/db.inc.php";
session_start();
$usernameLog = $_SESSION["username"];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $details = json_decode($_POST['details'], true);
    $balance = $details['balance'];
    $item = $details['item'];

    $stmt = $conn->prepare("INSERT INTO checkout (balance,item,userName) VALUES (?,?,?)");
    $stmt->bind_param("iss", $balance, $item, $usernameLog);

    if ($stmt->execute()) {
        echo "Number saved successfully";
    } else {
        echo "Error saving number: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
