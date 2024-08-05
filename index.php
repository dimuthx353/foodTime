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

<?php
if (!$userLoginIcon) { ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const checkoutBtn = document.getElementById("checkout-btn");

      // Select all add-to-cart buttons
      const addtocartbtns = document.querySelectorAll(".ctz-add-to-cart-btn");

      // Function to handle the add to cart action
      function handleAddToCart() {
        alert("logging first");
      }

      // Add event listener to each button
      addtocartbtns.forEach(button => {
        button.addEventListener("click", handleAddToCart);
      });

      checkoutBtn.addEventListener("click", () => {
        alert("logging first");

      })
    });
  </script>
<?php } ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./includes/common/navigation.css">
  <title>Food ordering web</title>

  <!-- jquery styles -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css' integrity='sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==' crossorigin='anonymous' />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- boostrap cdn  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css" />
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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
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

  <div class="main-menus mb-5">
    <!--filter section-->
    <div class="main-filter ">
      <div class="h-auto ">
        <h2 class="main-title">
          <h1 class="text-center mb-5 mt-3"> Menus Category</h1>
        </h2>
        <div id="tabs">
          <ul>
            <li><a href="#tabs-1">All Menus</a></li>
            <li><a href="#tabs-2"><i class="fa-solid fa-fish"></i> Kottu</a></li>
            <li><a href="#tabs-3"><i class="fa-solid fa-bowl-rice"></i> Rice</a></li>
            <li><a href="#tabs-4"><i class="fa-solid fa-ice-cream"></i> Ice Cream</a></li>
            <li><a href="#tabs-5"><i class="fa-solid fa-pizza-slice"></i> Pizza</a></li>
            <li><a href="#tabs-8"><i class="fa-solid fa-burger"></i> Buger</a></li>
          </ul>
          <div class="border text-black  p-3 border bg-primary text-white mt-3 border-primary text-center">
            <div class="d-flex justify-content-end align-items-center">
              <p class="text-warning">Total Cart Items <span id="cart-item">
                  <?php
                  // Assume $conn is your database connection
                  $userLoginIcon = $conn->real_escape_string($userLoginIcon); // Escape the variable to prevent SQL injection

                  // Prepare the SQL query
                  $sql = "SELECT * FROM checkout WHERE userName = '$userLoginIcon'";
                  $result = $conn->query($sql);

                  // Check for a valid result
                  if ($result) {
                    $rowsNum = $result->num_rows;

                    // Output the number of rows
                    echo $rowsNum;
                  } else {
                    // Handle the error
                    echo "0";
                  }
                  ?>

                </span> <span>|</span></p> &nbsp;
              <p><span id="cart-balance">
                  <?php
                  // Assume $conn is your database connection
                  $userLoginIcon = $conn->real_escape_string($userLoginIcon); // Escape the variable to prevent SQL injection

                  // Initialize totalBalance
                  $totalBalance = 0;

                  // Prepare the SQL query
                  $sql = "SELECT * FROM checkout WHERE username = '$userLoginIcon'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      $totalBalance += $row["balance"];
                    }
                    // Closing PHP tag
                  ?>
                    <!-- You can now use the total balance in your HTML or other PHP code -->
                    <p>Total Balance: <?php echo $totalBalance; ?>LKR</p>
                  <?php
                  } else {
                    // echo "0 results";
                  }
                  ?>


                </span></p>
            </div>
            <div class="d-flex justify-content-end align-items-center">
              <?php
              if (!$userLoginIcon) {
                echo "<button type='button' id='checkout-btn' class='btn btn-danger border border-white'>
<i class='bi bi-cart text-white'> <span class='text-white'>Cart</span></i>
</button>";
              } else {
                echo "<a href='./checkout.php'><button type='button' id='checkout-btn' class='btn btn-danger border border-white'>
                <i class='bi bi-cart text-white'><span class='text-white'>Cart</span></i>
              </button></a>";
              }




              ?>

            </div>
          </div>
          <div id="tabs-1" class="">
            <div class="main-detail m-auto ">
              <h2 class="main-title">Choose Order</h2>
              <div class="detail-wrapper">
                <?php
                $sql = "SELECT * FROM items;";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) { ?>
                    <div class="detail-card">
                      <img class="detail-img" src="<?php echo htmlspecialchars($row["imgSrc"], ENT_QUOTES, 'UTF-8'); ?>" />
                      <div class="detail-desc">
                        <div class="detail-name">
                          <div>
                            <h4><?php echo htmlspecialchars($row['itemName'], ENT_QUOTES, 'UTF-8'); ?></h4>
                            <p class="detail-sub">
                              <?php echo htmlspecialchars($row["description"], ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                          </div>
                          <div class="">
                            <p class="price"><?php echo htmlspecialchars($row["price"], ENT_QUOTES, 'UTF-8'); ?>LKR</p>
                            <button type="button" class="btn btn-primary ctz-add-to-cart-btn" onclick="addToCart(event,400)">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php }
                } else {
                  echo "0 results";
                }
                ?>
              </div>
            </div>
          </div>
          <div id="tabs-2">
            <div class="main-detail">
              <h2 class="main-title">Choose Order</h2>
              <div class="detail-wrapper">
                <?php
                // Assuming $conn is your database connection
                $category = 'kottu';

                // Prepare the statement
                $stmt = $conn->prepare("SELECT * FROM items WHERE category=?");
                $stmt->bind_param("s", $category);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) { ?>
                    <div class="detail-card">
                      <img class="detail-img" src="<?php echo htmlspecialchars($row["imgSrc"], ENT_QUOTES, 'UTF-8'); ?>" />
                      <div class="detail-desc">
                        <div class="detail-name">
                          <div>
                            <h4><?php echo htmlspecialchars($row['itemName'], ENT_QUOTES, 'UTF-8'); ?></h4>
                            <p class="detail-sub">
                              <?php echo htmlspecialchars($row["description"], ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                          </div>
                          <div class="">
                            <p class="price"><?php echo htmlspecialchars($row["price"], ENT_QUOTES, 'UTF-8'); ?>LKR</p>
                            <button type="button" class="btn btn-primary ctz-add-to-cart-btn" onclick="addToCart(event,400)">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php }
                } else {
                  echo "0 results";
                }

                // Close the statement
                $stmt->close();
                ?>

              </div>
            </div>
          </div>
          <div id="tabs-3">
            <div class="main-detail">
              <h2 class="main-title">Choose Order</h2>
              <div class="detail-wrapper">
                <?php
                // Assuming $conn is your database connection
                $category = 'rice';

                // Prepare the statement
                $stmt = $conn->prepare("SELECT * FROM items WHERE category=?");
                $stmt->bind_param("s", $category);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) { ?>
                    <div class="detail-card">
                      <img class="detail-img" src="<?php echo htmlspecialchars($row["imgSrc"], ENT_QUOTES, 'UTF-8'); ?>" />
                      <div class="detail-desc">
                        <div class="detail-name">
                          <div>
                            <h4><?php echo htmlspecialchars($row['itemName'], ENT_QUOTES, 'UTF-8'); ?></h4>
                            <p class="detail-sub">
                              <?php echo htmlspecialchars($row["description"], ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                          </div>
                          <div class="">
                            <p class="price"><?php echo htmlspecialchars($row["price"], ENT_QUOTES, 'UTF-8'); ?>LKR</p>
                            <button type="button" class="btn btn-primary ctz-add-to-cart-btn" onclick="addToCart(event,400)">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php }
                } else {
                  echo "0 results";
                }

                // Close the statement
                $stmt->close();
                ?>

              </div>
            </div>
          </div>
          <div id="tabs-4">
            <div class="main-detail">
              <h2 class="main-title">Choose Order</h2>
              <div class="detail-wrapper">
                <?php
                // Assuming $conn is your database connection
                $category = 'ice_cream'; // Corrected the category name

                // Prepare the statement
                $stmt = $conn->prepare("SELECT * FROM items WHERE category=?");
                $stmt->bind_param("s", $category);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) { ?>
                    <div class="detail-card">
                      <img class="detail-img" src="<?php echo htmlspecialchars($row["imgSrc"], ENT_QUOTES, 'UTF-8'); ?>" />
                      <div class="detail-desc">
                        <div class="detail-name">
                          <div>
                            <h4><?php echo htmlspecialchars($row['itemName'], ENT_QUOTES, 'UTF-8'); ?></h4>
                            <p class="detail-sub">
                              <?php echo htmlspecialchars($row["description"], ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                          </div>
                          <div class="">
                            <p class="price"><?php echo htmlspecialchars($row["price"], ENT_QUOTES, 'UTF-8'); ?>LKR</p>
                            <button type="button" class="btn btn-primary ctz-add-to-cart-btn" onclick="addToCart(event,400)">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php }
                } else {
                  echo "0 results";
                }

                // Close the statement
                $stmt->close();
                ?>

              </div>
            </div>
          </div>
          <div id="tabs-5">
            <div class="main-detail">
              <h2 class="main-title">Choose Order</h2>
              <div class="detail-wrapper">
                <?php
                // Assuming $conn is your database connection
                $category = 'pizza';

                // Prepare the statement
                $stmt = $conn->prepare("SELECT * FROM items WHERE category=?");
                $stmt->bind_param("s", $category);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) { ?>
                    <div class="detail-card">
                      <img class="detail-img" src="<?php echo htmlspecialchars($row["imgSrc"], ENT_QUOTES, 'UTF-8'); ?>" />
                      <div class="detail-desc">
                        <div class="detail-name">
                          <div>
                            <h4><?php echo htmlspecialchars($row['itemName'], ENT_QUOTES, 'UTF-8'); ?></h4>
                            <p class="detail-sub">
                              <?php echo htmlspecialchars($row["description"], ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                          </div>
                          <div class="">
                            <p class="price"><?php echo htmlspecialchars($row["price"], ENT_QUOTES, 'UTF-8'); ?>LKR</p>
                            <button type="button" class="btn btn-primary ctz-add-to-cart-btn" onclick="addToCart(event,400)">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php }
                } else {
                  echo "0 results";
                }

                // Close the statement
                $stmt->close();
                ?>

              </div>
            </div>
          </div>
          <div id="tabs-8">
            <div class="main-detail">
              <h2 class="main-title">Choose Order</h2>
              <div class="detail-wrapper">
                <?php
                $sql = "SELECT * FROM items WHERE category='buger';";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) { ?>
                    <div class="detail-card">
                      <img class="detail-img" src="<?php echo htmlspecialchars($row["imgSrc"], ENT_QUOTES, 'UTF-8'); ?>" />
                      <div class="detail-desc">
                        <div class="detail-name">
                          <div>
                            <h4><?php echo htmlspecialchars($row['itemName'], ENT_QUOTES, 'UTF-8'); ?></h4>
                            <p class="detail-sub">
                              <?php echo htmlspecialchars($row["description"], ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                          </div>
                          <div class="">
                            <p class="price"><?php echo htmlspecialchars($row["price"], ENT_QUOTES, 'UTF-8'); ?>LKR</p>
                            <button type="button" class="btn btn-primary ctz-add-to-cart-btn" onclick="addToCart(event,400)">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php }
                } else {
                  echo "0 results";
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr class=" divider" />
  </div>
  <footer class="text-center bg-body-tertiary">
    <!-- Grid container -->
    <div class="container pt-4">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

        <!-- Twitter -->
        <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

        <!-- Google -->
        <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>

        <!-- Instagram -->
        <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

        <!-- Linkedin -->
        <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>
        <!-- Github -->
        <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2024 Copyright:
      <a class="text-body" href="#">FoodTime</a>
    </div>
    <!-- Copyright -->
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <?php
  if ($userLoginIcon) {
    echo '<script src="./js/index.js"></script>';
  }
  ?>
  <script>
    $(document).ready(function() {
      $("#tabs").tabs();
    });
  </script>
</body>

</html>