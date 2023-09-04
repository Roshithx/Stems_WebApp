<?php
include('parentvalid.php');
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
  <h1>Parent Registration</h1>
    <form action="" method="post">
        <div>
            <label for="studentname">Student Name</label>
            <input type="text" name="studentname" id="">
            <strong style="color:red">
    <?php
    if($serr!=1)
    {
      echo $serr;
    }
    ?>
    </strong>
            </div>
            <div>
                <label for="parentname">Parent Name</label>
                <input type="text" name="parentname" id="">
                <strong style="color:red">
    <?php
    if($parr!=1)
    {
      echo $parr;
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
                <label for="contact">Contact</label>
                <input type="text" name="contact" id="">
                <strong style="color:red">
    <?php
    if($corr!=1)
    {
      echo $corr;
    }
    ?>
    </strong>
            </div>
            <div>
                <input type="submit" name="Register" value="Register">
            </div>
        </div>
    </form>
</body>
</html>