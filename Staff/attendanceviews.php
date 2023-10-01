<?php
include('../connection.php');
$coa=isset($_POST['yid'])?$_POST['yid']:"";
$yoa=isset($_POST['cid'])?$_POST['cid']:"";
if(isset($_POST['date'])){
    $date=$_POST['date'];
}
else{
    $date=date("Y-m-d");
}
$e="select *,student_tb.id as sid from student_tb inner join course_tb on student_tb.course=course_tb.id where Year='$coa' and course='$yoa'";
$cos=mysqli_query($con,$e);
if(mysqli_num_rows($cos)>0){
?>
<html>
   <body>
      <form action="attendancecheck.php" method="post">
      <input type="hidden" name="course" value="<?php echo $yoa;?>">
      <input type="hidden" name="Year" value="<?php echo $coa;?>">
   <table border=3 id="ta">
   <thead>
 <tr>
    <td rowspan="2" align="center">Name</td>
    <td rowspan="2" align="center">Regno</td>
    <td rowspan="2" align="center">Course</td>
    <td colspan="5" align="center">Attendance</td>
 </tr>
<tr>
   <td>Period 1</td>
   <td>Period 2</td>
   <td>Period 3</td>
   <td>Period 4</td>
   <td>Period 5</td>
</tr>
   </thead>
   <tbody>

   <?php
while($r=mysqli_fetch_array($cos)){
    $student=$r['sid'];
   ?>
   <tr>
    <td><?php echo $r['name'];?></td>
    <td><?php echo $r['Regno'];?></td>
    <td><?php echo $r['Course_name'];?></td>
    <td>
        <?php 
        $at="select * from present_tb where date='$date' and period='period 1' and student_id='$student'";
        $b=mysqli_query($con,$at);
        if(mysqli_num_rows($b)>0){
            echo "Present";

        }
        else{
            echo "absent";
        }
        ?>
    </td>
    <td>
    <?php 
        $at="select * from present_tb where date='$date' and period='period 2' and student_id='$student'";
        $b=mysqli_query($con,$at);
        if(mysqli_num_rows($b)>0){
            echo "Present";

        }
        else{
            echo "absent";
        }
        ?>
    </td>
    <td> <?php 
        $at="select * from present_tb where date='$date' and period='period 3' and student_id='$student'";
        $b=mysqli_query($con,$at);
        if(mysqli_num_rows($b)>0){
            echo "Present";

        }
        else{
            echo "absent";
        }
        ?></td>
    <td>
    <?php 
        $at="select * from present_tb where date='$date' and period='period 4' and student_id='$student'";
        $b=mysqli_query($con,$at);
        if(mysqli_num_rows($b)>0){
            echo "Present";

        }
        else{
            echo "absent";
        }
        ?>
    </td>
    <td>
    <?php 
        $at="select * from present_tb where date='$date' and period='period 5' and student_id='$student'";
        $b=mysqli_query($con,$at);
        if(mysqli_num_rows($b)>0){
            echo "Present";

        }
        else{
            echo "absent";
        }
        ?>
    </td>
   </tr>
   <?php 
}
?>
</tbody>
</table>
</form>
   </body>
</html>
<?php
}
?>