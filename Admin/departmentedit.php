<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
$id=$_GET['id'];
$q="select * from department_tb where id=$id";
$res=mysqli_query($con,$q);
$row=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <form action="departmentupdate.php?id=<?php echo $id;?>" method="post">
    <label for="Department_name">Department Name</label>
    <input type="text" name="Department_name" value="<?php echo $row['Department_name'];?>">
    </div>
    <div>
        <input type="submit" name="Add" value="Update">
    </div>
</form>
</body>
</html>