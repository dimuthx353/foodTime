<?php
include "./includes/db.inc.php";
session_start();

$userLoginIcon = $_SESSION["username"];



if (isset($_SESSION["status"])) {
    $status = $_SESSION["status"];
}

$totalB = 0;
$totalBalance = 0;
$status = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Food Time</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                    <?php
                    if (!$userLoginIcon) {
                        echo "<a class='nav-link' href='./signin.php'>Signin</a>";
                        echo "<a class='nav-link' href='./signup.php'>SignUp</a>";
                    } ?>

                    <?php
                    if ($userLoginIcon) {
                        echo "<a class='nav-link' href='./includes/logout.inc.php'>Logout</a>";
                    } ?>

                    <?php
                    if ($status == 1) {
                        echo "<a class='nav-link' href='./admin.php'>Admin</a>";
                    } ?>
                    <a class="nav-link" href="#">
                        <?Php
                        echo strtoupper($userLoginIcon);
                        ?>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <h2 class="mt-5 text-center">Checkout</h2>
    <div class="container col-4 m-auto bg-primary mt-5 pt-5">
        <table class="table border">
            <thead>
                <tr>
                    <th scope="col">Items</th>
                    <th scope="col" class="text-end">Price</th>
                    <th></th>
                </tr>

            </thead>
            <tbody class="">
                <?php

                $sql = "SELECT * FROM checkout WHERE userName = ?";
                $stmt = $conn->prepare($sql);

                $stmt->bind_param("s", $userLoginIcon);

                $stmt->execute();

                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['item']); ?></td>
                            <td class="text-end"><?php echo htmlspecialchars($row['balance']); ?> LKR</td>
                            <td><a href="<?php echo '../includes/delete.php?id=' . $row['id'] . '&type=checkout&page=checkout'; ?>"><i class="bi bi-trash text-danger"></i></a></td>
                        </tr>

                        <?php $totalB += $row['balance']; ?>
                <?php }
                }

                $stmt->close();
                ?>

                <tr class="bg-primary">
                    <td class="bg-secondary">Total</td>
                    <td class="bg-secondary text-end">
                        <?php
                        echo $totalB . " LKR";
                        ?>
                    </td>
                    <td class="bg-secondary">
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-info mb-3 text-black">Checkout</button></button>
    </div>
</body>

</html>