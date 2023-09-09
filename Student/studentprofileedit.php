<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
session_start();
$id=$_SESSION['id'];
$q="select * from student_tb where id=$id";
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
    <form action="studentupdate.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
    <label for="name">Name</label>
    <input type="text" name="name" value="<?php echo $row['name'];?>">
    </div>
    <div>
    <label for="">Reg No</label>
    <input type="text" name="Regno" value="<?php echo $row['Regno'];?>">
    </div>
    <div>
            <label for="department">Department</label>
            <select name="department" id="">
            <option value="">Select Department</option>
         <?php
         while($r=mysqli_fetch_array($cos)){
          ?>
          <option value="<?php echo $r['id'];?>"><?php echo $r['Department_name'];?></option>
          <?php
         }
         ?>   
        </select>
     </div>
     <div>
        <label for="Course">Course</label>
        <select name="Course_name" id="">
         <option value="">Select Course</option>   
         <?php
         while($c=mysqli_fetch_array($cod)){
          ?>
          <option value="<?php echo $c['id'];?>"><?php echo $c['Course_name'];?></option>
          <?php
         }
         ?>   
        </select>
    </div>
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo $row['username'];?>" disabled>
    </div>
    <div>
        <label for="image">Profile</label>
        <img src="../Images/<?php echo $row['images']; ?>" height="100px" width="100px" alt="">
        <input type="file" name="images" value="<?php echo $row['images'];?>">
    </div>
    <div>
        <input type="submit" name="Register" value="Update">
    </div>
</form>
</body>
</html>