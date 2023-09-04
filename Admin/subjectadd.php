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
    <h1>Subject Addition</h1>
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
       <div>
       <label for="">Add a Subject</label>
       <input type="text" name="subject">
       </div>
       <input type="submit" value="Add" name="Add">
    </form>
</body>
</html>
<?php
$q="select *,course_tb.Course_name as cid,subject_tb.id as sid from subject_tb inner join Course_tb on Course_tb.id=subject_tb.Course_name inner join department_tb on department_tb.id=Course_tb.Department_name";
$res=mysqli_query($con,$q);

?>
<html>
    <head>

    </head>
    <body>
        <h1>Subjects</h1>
        <table border=3>
            <thead>
                <th>Department</th>
                <th>Course</th>
                <th>Semester</th>
                <th>Subject</th>  
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
                        <td>
                        <?php echo $row['cid'];?>
                        </td>
                       
                        <td>
                        <?php echo $row['semester'];?>
                        </td> 
                        <td>
                        <?php echo $row['subject'];?>
                        </td>                      
                         <td><a href="subjectedit.php?id=<?php echo $row['sid'];?>">EDIT</a></td>
                        <td><a href="subjectdelete.php?id=<?php echo $row['sid'];?>">DELETE</a></td>
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