<?php
include('staffvalid.php');
$q="select * from department_tb";
$cos=mysqli_query($con,$q);
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Staff Registration</h1>
    <div>
    <form action="" method="post" enctype="multipart/form-data">
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
                <label for="email">Email</label>
                <input type="email" name="email">
                <strong style="color:red">
    <?php
    if($err!=1)
    {
      echo $err;
    }
    ?>
    </strong>
            </div>
    <div>
        <input type="file" name="images"> 
    </div>
    <div>
        <input type="submit" name="Register" value="Register">
    </div>
</form>
</body>
</html>