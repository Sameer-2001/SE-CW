<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'prototype');

	// initialize variables
	$name = "";
	$email = "";
    $usertype = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
        $usertype = $_POST['user_type'];

		mysqli_query($db, "INSERT INTO login (name, email, user_type) VALUES ('$name', '$email', '$usertype')"); 
		$_SESSION['message'] = "Information saved"; 
		header('location: editaccounts.php');
    }

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM login WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$email = $n['email'];
            $usertype = $n['user_type'];
		}
	}

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM login WHERE id=$id");
        $_SESSION['message'] = "Row deleted!"; 
        header('location: editaccounts.php');
    }
    ?>


<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
    <style>
        body {
    font-size: 19px;
}
table{
    width: 50%;
    margin: 30px auto;
    border-collapse: collapse;
    text-align: left;
}
tr {
    border-bottom: 1px solid #cbcbcb;
}
th, td{
    border: none;
    height: 30px;
    padding: 2px;
}
tr:hover {
    background: #F5F5F5;
}

form {
    width: 45%;
    margin: 50px auto;
    text-align: left;
    padding: 20px; 
    border: 1px solid #bbbbbb; 
    border-radius: 5px;
}

.input-group {
    margin: 10px 0px 10px 0px;
}
.input-group label {
    display: block;
    text-align: left;
    margin: 3px;
}
.input-group input {
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;
}
.btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #5F9EA0;
    border: none;
    border-radius: 5px;
}
.edit_btn {
    text-decoration: none;
    padding: 2px 5px;
    background: #2E8B57;
    color: white;
    border-radius: 3px;
}

.del_btn {
    text-decoration: none;
    padding: 2px 5px;
    color: white;
    border-radius: 3px;
    background: #800000;
}
.msg {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    width: 50%;
    text-align: center;
}

/* Add a black background color to the top navigation */
.topnav {
    background-color: rgb(221, 43, 43);
    overflow: hidden;
  }
  
  /* Style the links inside the navigation bar */
  .topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }
  
  /* Change the color of links on hover */
  .topnav a:hover {
    background-color: #ddd;
    color: black;
  }

</style>
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<?php $results = mysqli_query($db, "SELECT name, email, user_type, id FROM login"); ?>
<div class="topnav">
  <a class="active" href="admin.php">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div>
<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>E-mail</th>
            <th>User type</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
            <td><?php echo $row['user_type']; ?></td>
			<td>
                <a href="editaccounts.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
                <a href="editaccounts.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
                
		</tr>
	<?php } ?>
</table>

	<form method="post" action="editaccounts.php" >
		<div class="input-group">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>E-mail</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>

        <div class="input-group">
			<label>User Type</label>
			<input type="text" name="user_type" value="<?php echo $usertype; ?>">
		</div>
		<div class="input-group">
            <button class="btn" type="submit" name="save" >Save</button>
		</div>
	</form>
</body>
</html>
