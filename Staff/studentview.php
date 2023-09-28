<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
$q="select *,department_tb.Department_name as did,student_tb.id as sid from student_tb inner join Course_tb on Course_tb.id=student_tb.course inner join department_tb on department_tb.id=Course_tb.Department_name";
$res=mysqli_query($con,$q);

?>
<html>
    <head>

    </head>
    <body>
        <table border=3>
            <thead>
                <th>Name</th>
                <th>Reg No</th>
                <th>Department</th>
                <th>Course</th>
                <th>Year</th>
                <th>Username</th>
                <th>Password</th>
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
                            <?php echo $row['Regno'];?>
                        </td>
                        <td>
                        <?php echo $row['did'];?>
                        </td>
                        <td> <?php echo $row['Course_name'];?></td>
                        <td><?php echo $row['Year'] ?></td>
                        <td> <?php echo $row['username'];?></td>
                        <td> <?php echo $row['password'];?></td>
                        <td><img src="../Images/<?php echo $row['images'];?>" height="100px" width="100px" alt=""></td>
                        <td><a href="studentedit.php?id=<?php echo $row['sid'];?>">EDIT</a></td>
                        <td><a href="studentdelete.php?id=<?php echo $row['sid'];?>">DELETE</a></td>

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