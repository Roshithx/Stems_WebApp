<?php
include('../connection.php');
$coa=isset($_POST['yid'])?$_POST['yid']:"";
$yoa=isset($_POST['cid'])?$_POST['cid']:"";
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
   ?>
   <tr>
    <td><?php echo $r['name'];?></td>
    <td><?php echo $r['Regno'];?></td>
    <td><?php echo $r['Course_name'];?></td>
    <td><input type="checkbox" name="p1[]" id="" value="<?php echo $r['sid'];?>"></td>
    <td><input type="checkbox" name="p2[]" id="" value="<?php echo $r['sid'];?>"></td>
    <td><input type="checkbox" name="p3[]" id="" value="<?php echo $r['sid'];?>"></td>
    <td><input type="checkbox" name="p4[]" id="" value="<?php echo $r['sid'];?>"></td>
    <td><input type="checkbox" name="p5[]" id="" value="<?php echo $r['sid'];?>"></td>
   </tr>
   <?php 
}
?>
 <tr>
    <td></td>
    <td></td>
    <td></td>
    <td><input type="submit" value="Add" name="period1"></td>
    <td><input type="submit" value="Add" name="period2"></td>
    <td><input type="submit" value="Add" name="period3"></td>
    <td><input type="submit" value="Add" name="period4"></td>
    <td><input type="submit" value="Add" name="period5"></td>
    <tr>
</tbody>
</table>
</form>
   </body>
</html>
<?php
}
?>