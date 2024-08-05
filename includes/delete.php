<?php
include './db.inc.php';


if (isset($_GET['id'])) {
    $id = ($_GET['id']);
    $type = ($_GET['type']);

    // Prepare the DELETE statement
    $sql = "DELETE FROM $type WHERE id = ?";

    // Initialize the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameter
        $stmt->bind_param('i', $id);

        // Execute the statement
        if ($stmt->execute()) {
            if ($_GET['page'] == "checkout") {
                header("Location:../../checkout.php");
                echo "Record deleted successfully.";
                exit();
            } else {
                header("Location:../../admin.php");
                echo "Record deleted successfully.";
                exit();
            }
        } else {
            echo "Error deleting record: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
