
<?php 
include "connect.php";
$sql = "select * from emp";
$result = mysqli_query($conn,$sql);
?>
<html>
<head>
<title>Employee Management</title>
</head>
<?php 
if(isset($_POST['action']) && $_POST['action']=="delete") {
    $emp_id=$_POST["emp_id"];
    $sql = "delete from emp where emp_id='$emp_id'";
    if(mysqli_query($conn,$sql)) {
        echo "<script>alert('Employee is Deleted !!')</script>";
        echo "<script>window.location.assign('home.php')</script>";

    }
    else{
        echo "Error. ".mysqli_error($conn);
    }

}

?>
<body>
<table border="4" cellpadding="10" cellspacing="1" align="center">
<tr style="color: white;font-weight: bold;background-color: #c0c0c0">
<th>
    Employee Name
</th>
<th>
    Employee Age
</th>
<th>
    Department
</th>
<th>
    Actions
</th>
</tr>
<tr>
<?php
if($result->num_rows >= 1) {
while($row = mysqli_fetch_array($result)) { ?>
<td><?php echo $row['emp_name']; ?></td>
<td><?php echo $row['emp_age']; ?></td>
<td><?php echo $row['department']; ?></td>
<td colspan="3">
    <a href="edit.php/<?php echo $row['emp_id']; ?>" style="padding:5px 10px;background-color:green;color:white;text-decoration:none;">Update</a>&nbsp;&nbsp;&nbsp;
    <form action="" method="POST">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="emp_id" value="<?php echo $row['emp_id']; ?>">
        <input type="submit" value="Delete" style="padding:5px 10px;background-color:red;color:white;text-decoration:none;">
    </form>
</td>
</tr>
<?php }
    }
else { ?>
    <tr><td colspan="4">no employee found..</td></tr>
<?php }
?>
</table>
<br>
<center><a href="add.php" style="padding:15px 20px;background-color:#bb05fe;color:white;text-decoration:none;">Add employee</a></center>
</body>
</html>