<?php
include ("config.php");

if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM searchrpo WHERE name LIKE '{$input}%' OR email LIKE '{$input}%'"; 
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){?>
      <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $name = $row['name'];
                    $number = $row['Number'];
                    $email = $row['email'];
                }
                ?>
                <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $name;?></td>
                    <td><?php echo $number;?></td>
                    <td><?php echo $email;?></td>
                </tr>
                

        </table>
        <?php
    }else{
        echo "<h6 class = 'text-danger text-center mt-3'>No Data Found</h6>";
    }
}
?>