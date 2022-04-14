<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['rpo_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>RPO page</title>
   <style>


</style>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/consultant.css">

</head>
<body>
<div class="topnav">
  <a class="active" href="rpo.php">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div>





   
<div class="container">

   <div class="content">
      <h1>Welcome <span><?php echo $_SESSION['rpo_name']?></span>!</h1>
      <p>This is a Residentual Property Owner page</p>
      <a href="phome.php" class="btn">List property</a>
      <a href="logout.php" class="btn">logout</a>
   </div>
</div>
</body>