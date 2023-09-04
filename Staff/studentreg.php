<?php
include('studentvalid.php');
$q="select * from department_tb";
$e="select * from Course_tb";
$cos=mysqli_query($con,$q);
$cod=mysqli_query($con,$e);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Student Registration</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="">
            <strong style="color:red">
    <?php
    if($nerr!=1)
    {
      echo $nerr;
    }
    ?>
    </strong>
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
            <strong style="color:red">
    <?php
    if($derr!=1)
    {
      echo $derr;
    }
    ?>
    </strong>
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
        
            <strong style="color:red">
    <?php
    if($cerr!=1)
    {
      echo $cerr;
    }
    ?>
    </strong>
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="">
            <strong style="color:red">
    <?php
    if($uerr!=1)
    {
      echo $uerr;
    }
    ?>
    </strong>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="text" name="password" id="">
            <strong style="color:red">
    <?php
    if($perr!=1)
    {
      echo $perr;
    }
    ?>
    </strong>
        </div>
        <div>
            <input type="submit" name="Register" value="Register">
        </div>
        <div>
            <input type="file" name="images"> 
        </div>

       
    </form>
</body>
</html>