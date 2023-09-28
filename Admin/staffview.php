<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
$q="select *,staff_tb.id as sid from staff_tb inner join department_tb on staff_tb.department=department_tb.id";
$res=mysqli_query($con,$q);

?>
<html>
    <head>

    </head>
    <body>
        <h1>Staff Details</h1>
        <table border=3>
            <thead>
                <th>Name</th>
                <th>Department</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Profile</th>
            </thead>
            <tbody>
                <?php
                while($row=mysqli_fetch_array($res))
                {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['name'];?>
                        </td>
                        <td>
                        <?php echo $row['Department_name'];?>
                        </td>
                        <td> <?php echo $row['username'];?></td>
                        <td> <?php echo $row['password'];?></td>
                        <td> <?php echo $row['email'];?></td>
                        <td> <?php echo $row['contact'];?></td>
                        <td><img src="../Images/<?php echo $row['images'];?>" height="100px" width="100px" alt=""></td>
                        <td><a href="staffedits.php?id=<?php echo $row['sid'];?>">EDIT</a></td>
                        <td><a href="staffdelete.php?id=<?php echo $row['id'];?>">DELETE</a></td>
                    </tr>

                    <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
<?php

?>