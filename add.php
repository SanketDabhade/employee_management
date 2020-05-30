<?php 
include "connect.php";
?>
<html>
    <head>
        <title>Add Employee</title>
    </head>
	<?php 
	if(isset($_POST['action']) && $_POST['action']=="add") {
        $empname=$_POST["name"];
        $age=$_POST["age"];
        $dept=$_POST["department"];
        $sql = "insert into emp (emp_name,emp_age,department) values('".$empname."','".$age."','".$dept."')";
        if(mysqli_query($conn,$sql)) {
            echo "<script>alert('Employee is added !!')</script>";
            echo "<script>window.location.assign('home.php')</script>";
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
                <td><input type="text" name="name" required></td>
				<input type="hidden" name="action" value="add">
            </tr>
            <tr>
                <td><label>Employee Age </label></td>
                <td><input type="text" name="age" required></td>
            </tr>
            <tr>
                <td><label>Department </label></td>
                <td><input type="text" name="department" required></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Add" style="padding:5px 10px;background-color:green;color:white;text-decoration:none;">
                </td>
                <td>
                    <a href="home.php" style="padding:5px 10px;background-color:red;color:white;text-decoration:none;">Home</a> 
                </td>
            </tr>
            </table>
        </form>
    </body>
</html>