<!-- <?php
  session_start();
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Foodstuff</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="orderDetail.php">Orders<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
    <form class="form-inline my-2 my-lg-0">
      <label class="text-light">Hello, <?php echo $_SESSION['user']; ?></label>
      <?php 

        if(isset($_GET['id'])){
      ?>
       <a class="nav-link text-light" href="account.php">
        <span class="fa fa-user"></span>
      </a>
      <a class="nav-link text-light" href="cart.php?id=<?php echo $_GET['id']; ?>">
        <span class="fa fa-shopping-cart"></span>
      </a>
      <span class="badge badge-pill badge-dark" style="font-size: 10px;right: 21px;bottom: 8px;position: relative;">
         <?php 
          $id = $_GET['id'];
          $count = 0; 
          $con = mysqli_connect("localhost","root","","dbtyproject");
          $res = mysqli_query($con,"select * from `cart` where `u_id` = '".$_SESSION['user']."' and `h_id`='$id'");
          echo @mysqli_num_rows($res);
        ?>
      </span>
          <?php }
          ?>
     
  <!--     <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
    </form>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
    </body>
</html>