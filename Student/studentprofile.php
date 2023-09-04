<?php
include('../connection.php');
session_start();
$id=$_SESSION['id'];
$q="select * from student_tb where id=$id";
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
                         <div>
                         <img src="../Images/<?php echo $row['images'];?>" height="100px" width="100px" alt="">
                         </div>
                           <label for="">Name:</label> <?php echo $row['name'];?><br>
                           <label for="">Department:</label><?php echo $row['department'];?><br>
                           <label for="">Course:</label><?php echo $row['course'];?><br>
                           <label for="">Username:</label><?php echo $row['username'];?><br>
                           <label for="">Password:</label><?php echo $row['password'];?><br>
                           <a href="studentprofileedit.php">Edit Profile</a>
                    

                    <?php
                }
                ?>
    </body>
</html>
<?php

?>