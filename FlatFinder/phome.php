<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "prototype");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
    // Get price
    $price = mysqli_real_escape_string($db, $_POST['price']);
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO listproperty (image, price, text) VALUES ('$image', '$price', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		 $msg = "Property uploaded successfully";
  	}else{
  		$msg = "Failed to post property";
  	}
    print <<<DISPLAY_ALERT
    <script>
        alert('$msg');
    </script>
    DISPLAY_ALERT;
  }
  $result = mysqli_query($db, "SELECT * FROM listproperty");
?>
<!DOCTYPE html>
<html>
<head> <meta name="viewport" content="width=device-width, initial-scale=1">

<title>Image Upload</title>
<link rel="stylesheet" href="css/consultant.css"> 
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
  
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
   
</style>
</head>
<body>
<div class="topnav">
  <a class="active" href="rpo.php">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div>
      
<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
        echo "<p>".$row['price']."</p>";
      	echo "<p>".$row['text']."</p>";
      echo "</div>";
    }
  ?>

  <form method="POST" action="phome.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
    <div>
        Price: <input type="text" name="price">
    </div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="text" 
      	placeholder="Description of property..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>