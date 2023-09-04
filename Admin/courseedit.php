<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
$id=$_GET['id'];
$q="select * from Course_tb inner join Department_tb on Course_tb.Department_name=Department_tb.id where Course_tb.id=$id";
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
    <form action="courseupdate.php?id=<?php echo $id;?>" method="post">
    <label for="Course_name">Course Name</label>
    <input type="text" name="Course_name" value="<?php echo $row['Course_name'];?>">
    </div>
    <div>
    <label for="">Departments</label>
        <select name="Department_name" id="">
            <?php
            $con=new mysqli("localhost","root","",'admin_db');
            if($con->connect_error)
            {
                die("Connection failed");
            
            }
            $re="select * from department_tb";
            $cod=mysqli_query($con,$re);
            while($rec=mysqli_fetch_array($cod)){
?>          
              <option value="<?php echo $rec['id'];?>"><?php echo $rec['Department_name'];?></option>
<?php
            }
            ?>
          
        </select>
    </div>
    <div>
        <input type="submit" name="Add" value="Update">
    </div>
</form>
</body>
</html>