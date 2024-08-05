<?php
include "./includes/db.inc.php";
session_start();

$userLoginIcon = null;
$totalBalance = 0;
$status = 0;

if (isset($_SESSION["username"])) {
    $userLoginIcon = $_SESSION["username"];
}

if (isset($_SESSION["status"])) {
    $status = $_SESSION["status"];
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
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
                        echo "<a class='nav-link' href=''./signup.php'>SignUp</a>";
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

    <div class="container">
        <h2 class="mt-4 mb-2 text-center">Add New Item</h2>
        <div class="container col-lg-6 p-5">
            <form action="./includes/admin.inc.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Item Name</label>
                    <input type="text" class="form-control" id="" name="item_name">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Category</label>
                    <select class="form-select" aria-label="Default select example" name="category">
                        <option selected>Select Category</option>
                        <option value="buger">Buger</option>
                        <option value="pizza">Pizza</option>
                        <option value="ice_Cream">Ice Cream</option>
                        <option value="kottu">sea_food</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Price</label>
                    <input type="number" class="form-control" id="" name="price">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <input type="text" class="form-control" id="" name="description">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Image Source</label>
                    <input type="text" class="form-control" id="" name="img_src">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>

        <div class="border">
            <div class="table-responsive">
                <table class="table-hover table table-dark table-striped-columns table-bordered shadow-lg">
                    <h1 class="text-center text-info mb-5 shadow-lg p-3 mt-5 container">Manage All Items</h1>
                    <thead class="">
                        <tr class="">
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created on</th>
                            <th scope="col">Funtions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM items ;";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['itemName']; ?></td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td><?php echo $row['imgSrc']; ?></td>
                                    <td><a href="<?php echo '../includes/delete.php?id=' . $row['id'] . '&type=items'; ?>"><i class="bi bi-trash text-danger"></i></a></td>
                                </tr>
                        <?php }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>