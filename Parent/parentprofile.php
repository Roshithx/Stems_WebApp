<?php
include('../connection.php');
session_start();
$id=$_SESSION['id'];
$q="select * from parent_tb where id=$id";
$res=mysqli_query($con,$q);
?>
<html>
    <head>
    <title>profile</title>
    </head>
    <body>
        <h1>Profile</h1>
                <?php
                while($row=mysqli_fetch_array($res))
                {
                    ?>
                           <label for="">Parent Name:</label> <?php echo $row['parentname'];?><br>
                           <label for="">Student Name:</label> <?php echo $row['studentname'];?><br>
                           <label for="">Department:</label><?php echo $row['department'];?><br>
                           <label for="">Course:</label> <?php echo $row['course'];?><br>
                           <label for="">Username:</label><?php echo $row['username'];?><br>
                           <label for="">Password:</label><?php echo $row['password'];?><br>
                           <label for="">Contact:</label><?php echo $row['contact'];?><br>
                           <a href="parentprofileedit.php">Edit Profile</a>
                    

                    <?php
                }
                ?>
    </body>
</html>
<?php

?>