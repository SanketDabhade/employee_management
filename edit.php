<?php 
include "connect.php";
$data = $_SERVER['REQUEST_URI'];
 $rid = explode('/', $data);
 $emp_id = $rid[3];
//  echo $emp_id;
$sql = "select * from emp where emp_id=$emp_id";
$result=mysqli_query($conn,$sql);
if($result->num_rows >= 1) {
    while($row = mysqli_fetch_array($result)) { 
        $empname=$row['emp_name'];
        $empage=$row['emp_age'];
        $department=$row['department'];
    }
}
?>
<html>
    <head>
        <title>Edit Employee</title>
    </head>
	<?php 
	if(isset($_POST['action']) && $_POST['action']=="update") {
        $empname=$_POST["name"];
        $age=$_POST["age"];
        $dept=$_POST["department"];
        $sql = "update emp set emp_name='".$empname."',emp_age='$age',department='".$dept."' where emp_id='$emp_id'";
        if(mysqli_query($conn,$sql)) {
            echo "<script>alert('Employee is updated !!');</script>";
            // header('Location:../home.php');
            // echo $sql;
            echo "<script>window.location.assign('../home.php')</script>";
        }
        else{
            echo "Error. ".mysqli_error($conn);
        }

    }
	
	
	?>
    <body>
        <form method="post" action="">
            <table align="center">
            <tr>
                <td><label>Employee Name </label></td>
                <td><input type="text" name="name" value="<?php echo $empname; ?>" required></td>
				<input type="hidden" name="action" value="update">
            </tr>
            <tr>
                <td><label>Employee Age </label></td>
                <td><input type="text" name="age" value="<?php echo $empage; ?>" required></td>
            </tr>
            <tr>
                <td><label>Department </label></td>
                <td><input type="text" name="department" value="<?php echo $department; ?>" required></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Update" style="padding:5px 10px;background-color:green;color:white;text-decoration:none;">
                </td>
                <td>
                    <a href="../home.php" style="padding:5px 10px;background-color:red;color:white;text-decoration:none;">Home</a> 
                </td>
            </tr>
            </table>
        </form>
    </body>
</html>