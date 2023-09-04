<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
$q="select *,department_tb.Department_name as did from parent_tb inner join Course_tb on Course_tb.id=parent_tb.course inner join department_tb on department_tb.id=Course_tb.Department_name";

$res=mysqli_query($con,$q);

?>
<html>
    <head>

    </head>
    <body>
        <table border=3>
            <thead>
                <th>Student Name</th>
                <th>Parent Name</th>
                <th>Department</th>
                <th>Course</th>
                <th>Username</th>
                <th>Password</th>
                <th>Contact</th>
            </thead>
            <tbody>
                <?php
                while($row=mysqli_fetch_array($res))
                {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['studentname'];?>
                        </td>
                        <td>
                            <?php echo $row['parentname'];?>
                        </td>
                        <td>
                        <?php echo $row['did'];?>
                        </td>
                        <td>
                            <?php echo $row['Course_name'];?>
                        </td>
                        <td> <?php echo $row['username'];?></td>
                        <td> <?php echo $row['password'];?></td>
                        <td> <?php echo $row['contact'];?></td>
                        <td><a href="parentedit.php?id=<?php echo $row['id'];?>">EDIT</a></td>
                        <td><a href="parentupdate.php?id=<?php echo $row['id'];?>">UPDATE</a></td>

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