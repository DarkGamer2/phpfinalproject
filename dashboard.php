<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "shop_express";

session_start();

if (!isset($_SESSION['email'])) {
  header("Location: ./pages/LoginForm.html");
  exit;
}

$conn = new mysqli($host, $username, $password, $database);
$email = $_SESSION['email'];
$query = 'SELECT first_name FROM tblusers WHERE email =?';
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $email);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$username = $row['first_name'];

mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/index.css" />
  <link rel="stylesheet" href="./css/footer.css">
  <link rel="stylesheet" href="./css/dashboard.css">
  <script src="https://kit.fontawesome.com/89bbf2d478.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <title>Shop Express - Dashboard</title>
</head>

<body>
  <header>
    <nav class="nav-style">
      <ul class="nav-layout">
        <li class="title-nav-item">shop express</li>
        <li class="nav-item">
          <a href="./index.html">Home</a>
        </li>
        <li class="nav-item"><a href="./pages/Products.html">Products</a></li>
        <li class="nav-item"><a href="./pages/About.html">About</a></li>
        <li class="nav-item"><a href="./pages/Blog.html">Blog</a></li>
        <li class="nav-item"><a href="./pages/addProduct.html">Add Product</a></li>
        <li class="nav-item">
          <button class="dark-button">
            <i class="fa-solid fa-moon margin-icon"></i>Dark Mode
          </button>
        </li>
        <li class="nav-item">
         <a href="./cartpage.php">
         <button class="dark-button">
            <i class="fa-solid fa-cart-shopping margin-icon"></i> Cart
          </button>
         </a>
        </li>
        <li class="nav-item">
          <form action="logout.php" method="POST">
            <button type="submit"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out</button>
          </form>
        </li>
      </ul>
    </nav>
  </header>

  <section>
    <div class="container">
      <div class="greeting">
        <h1 class="greeting-title">Hello <?php echo $username ?></h1>
      </div>
    </div>
  </section>
  <section>
    <div>
      <h3 class="section-title">Your Orders</h3>
    </div>
  </section>
  <script src="./js/index.js"></script>
</body>

</html>