<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['consultant_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>FDM Consultant page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/consultant.css">

</head>
<body>
<div class="topnav">
  <a class="active" href="consultant.php">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div>
   
<div class="container">

   <div class="content">
      <h3>hi <span>FDMer!</span></h3>
      <h1>welcome <span><?php echo $_SESSION['consultant_name'] ?></span></h1>
      <p>this is a consultant page</p>
      <a href="review.html" class="btn">Add feedback</a>
      <a href="index.php" class="btn">Search RPO</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>