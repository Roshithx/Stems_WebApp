
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="department.php" method="post">
        <label for="">Add Department</label>
        <input type="text" name="Department_name">

        <input type="submit" value="Add" name="Add">
    </form>
</body>
</html>
<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
$q="select * from department_tb";
$res=mysqli_query($con,$q);

?>
<html>
    <head>

    </head>
    <body>
        <h1>Departments</h1>
        <table border=3>
            <thead>
                <th>Department name</th>
            </thead>
            <tbody>
                <?php
                while($row=mysqli_fetch_array($res))
                {
                    ?>
                    <tr>
                        <td>
                        <?php echo $row['Department_name'];?>
                        </td>
                        <td><a href="departmentedit.php?id=<?php echo $row['id'];?>">EDIT</a></td>
                        <td><a href="departmentdelete.php?id=<?php echo $row['id'];?>">DELETE</a></td>
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