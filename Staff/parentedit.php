<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
$id=$_GET['id'];
$coc="select * from department_tb";
$cos=mysqli_query($con,$coc);
$coz="select * from course_tb";
$cod=mysqli_query($con,$coz);
$q="select *,department_tb.Department_name as did from parent_tb inner join Course_tb on Course_tb.id=parent_tb.course inner join department_tb on department_tb.id=Course_tb.Department_name where parent_tb.id=$id";
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
    <h1>Parent Registration</h1>
    <div>
    <form action="parentupdate.php?id=<?php echo $id;?>" method="post">
    <div>
    <label for="studentname">Student Name</label>
    <input type="text" name="studentname" value="<?php echo $row['studentname'];?>">
    </div> 
    <div>
    <label for="parentname">Parent Name</label>
    <input type="text" name="parentname" value="<?php echo $row['parentname'];?>">
    </div> 
    <div>
            <label for="department">Department</label>
            <select name="department" id="">
            <option value="">Select Department</option>
            <?php
         while($r=mysqli_fetch_array($cos)){
          ?>
          <option value="<?php echo $r['id'];?>"
          <?php
          if($r['id']==$row['department']){
           echo "selected";
          }?>><?php echo $r['Department_name'];?></option>
          <?php
         }
         ?> 
        </select>
     </div>
     <div>
        <label for="Course">Course</label>
        <select name="course" id="">
         <option value="">Select Course</option>   
         <?php
         while($c=mysqli_fetch_array($cod)){
          ?>
          <option value="<?php echo $c['id'];?>"
          <?php
          if($c['id']==$row['course']){
           echo "selected";
          }?>>
          <?php echo $c['Course_name'];?></option>
          <?php
         }
         ?>   
        </select>
    </div>
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo $row['username'];?>">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="text" name="password" value="<?php echo $row['password'];?>">
            </div>
    <div>
        <label for="contact">Contact</label>
        <input type="text" name="contact" value="<?php echo $row['contact'];?>">
    </div>
    <div>
        <input type="submit" name="Register" value="Update">
    </div>
</form>
</body>
</html>