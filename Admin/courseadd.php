
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="course.php" method="post">
        <label for="">Departments</label>
        <select name="Department_name" id="">
            <?php
            $con=new mysqli("localhost","root","",'admin_db');
            if($con->connect_error)
            {
                die("Connection failed");
            
            }
            $re="select * from department_tb";
            $cod=mysqli_query($con,$re);
            while($rec=mysqli_fetch_array($cod)){
?>          
              <option value="<?php echo $rec['id'];?>"><?php echo $rec['Department_name'];?></option>
<?php
            }
            ?>
          
        </select>
        <label for="">Add Course</label>
        <input type="text" name="Course_name">

        <input type="submit" value="Add" name="Add">
    </form>
</body>
</html>
<?php
$q="select *,Course_tb.id as cid from Course_tb inner join Department_tb on Course_tb.Department_name=Department_tb.id";
$res=mysqli_query($con,$q);

?>
<html>
    <head>

    </head>
    <body>
        <h1>Courses</h1>
        <table border=3>
            <thead>
                <th>Course</th>
                <th>Department</th>
            </thead>
            <tbody>
                <?php
                while($row=mysqli_fetch_array($res))
                {
                    ?>
                    <tr>
                        <td>
                        <?php echo $row['Course_name'];?>
                        </td>
                        <td>
                        <?php echo $row['Department_name'];?>
                        </td>
                        <td><a href="courseedit.php?id=<?php echo $row['cid'];?>">EDIT</a></td>
                        <td><a href="coursedelete.php?id=<?php echo $row['cid'];?>">DELETE</a></td>
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