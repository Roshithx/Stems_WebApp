<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
$id=$_GET['id'];
$q="select *,course_tb.Course_name as cid,subject_tb.id as sid from subject_tb inner join Course_tb on course_tb.id=subject_tb.Course_name inner join department_tb on department_tb.id=course_tb.Department_name where subject_tb.id=$id";
$res=mysqli_query($con,$q);
$row=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <form action="subjectupdate.php?id=<?php echo $id;?>" method="post">
    <div>
    <label for="">Course</label>
        <select name="Course_name" id="">
            <?php
            $con=new mysqli("localhost","root","",'admin_db');
            if($con->connect_error)
            {
                die("Connection failed");
            
            }
            $re="select * from course_tb";
            $cod=mysqli_query($con,$re);
            while($rec=mysqli_fetch_array($cod)){
?>          
              <option value="<?php echo $rec['id'];?>"><?php echo $rec['Course_name'];?></option>
<?php
            }
            ?>
          
        </select>
    </div>
    <div>
        <label for="">Semester</label>
        <select name="semester" id="">
            <option value="">Select Semester</option>
            <option value="Semester 1"
               <?php
                if($row['semester']=='Semester 1')
                {
                    echo "selected";
                } 
                ?>>Semester 1</option>
            <option value="Semester 2"
            <?php
                if($row['semester']=='Semester 2')
                {
                    echo "selected";
                } 
                ?>>Semester 2</option>
            <option value="Semester 3"
            <?php
                if($row['semester']=='Semester 3')
                {
                    echo "selected";
                } 
                ?>>Semester 3</option>
            <option value="Semester 4"
            <?php
                if($row['semester']=='Semester 4')
                {
                    echo "selected";
                } 
                ?>>Semester 4</option>
            <option value="Semester 5"
            <?php
                if($row['semester']=='Semester 5')
                {
                    echo "selected";
                } 
                ?>>Semester 5</option>
        <option value="Semester 6"
            <?php
                if($row['semester']=='Semester 6')
                {
                    echo "selected";
                } 
                ?>>Semester 6</option>
        </select>
    </div>
    <div>
    <label for="">Subject</label>
    <input type="text" name="subject" value="<?php echo $row['subject'];?>">
    </div>
    <div>
        <input type="submit" name="Add" value="Update">
    </div>
</form>
</body>
</html>