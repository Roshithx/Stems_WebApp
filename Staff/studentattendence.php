<?php
include("../connection.php");
$e="select * from Course_tb";
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
    <h1>Attendence management</h1>
    <form action="subject.php" method="post">
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
 
            </div>
        <label for="">Semester</label>
       <select name="semester" id="">
          <option value="">Select Semester</option>
          <option value="Semester 1">Semester 1</option>
          <option value="Semester 2">Semester 2</option>
          <option value="Semester 3">Semester 3</option>
          <option value="Semester 4">Semester 4</option>
          <option value="Semester 5">Semester 5</option>
          <option value="Semester 6">Semester 6</option>
       </select>
    </form>
    <?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
$q="select *,department_tb.Department_name as did from student_tb inner join Course_tb on Course_tb.id=student_tb.course inner join department_tb on department_tb.id=Course_tb.Department_name";
$res=mysqli_query($con,$q);

?>
<html>
    <head>

    </head>
    <body>
        <table border=3>
            <thead>
                <th>Name</th>
                <th>Course</th> 
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
                        <?php echo $row['did'];?>
                        </td>
                        <td> <?php echo $row['Course_name'];?></td>
                        <td> <?php echo $row['username'];?></td>
                        <td> <?php echo $row['password'];?></td>
                        <td><img src="../Images/<?php echo $row['images'];?>" height="100px" width="100px" alt=""></td>
                        <td><a href="studentedit.php?id=<?php echo $row['id'];?>">EDIT</a></td>
                        <td><a href="studentupdate.php?id=<?php echo $row['id'];?>">UPDATE</a></td>
                        <td><a href="studentdelete.php?id=<?php echo $row['id'];?>">DELETE</a></td>

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
</body>
</html>