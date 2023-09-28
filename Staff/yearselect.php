<?php
include('../connection.php');
$coa=isset($_POST['yid'])?$_POST['yid']:"";
$yoa=isset($_POST['cid'])?$_POST['cid']:"";
$e="select * from student_tb inner join course_tb on student_tb.course=course_tb.id where Year='$coa' and course='$yoa'";
$cos=mysqli_query($con,$e);
if(mysqli_num_rows($cos)>0){
?>
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
   </tr>
   <?php 
}
?>
</tbody>
<?php
}
else{
   ?>
   <h3>Select Year</h3>
   <?php
}
?>