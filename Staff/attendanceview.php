<?php
include("../connection.php");
$e="select * from Course_tb";
$cod=mysqli_query($con,$e);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../js3/jquery-3.6.1.js">
     
     </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Attendence List </h1>
    <form action="attendancecheck.php" method="post">
    <div>
            <label for="Course">Course</label>
        <select name="Course_name" id="co">
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
        <label for=""> Select Year</label>
        <select name="Year" id="yea">
          <option value="">Select Year</option>
          <option value="1st Year">1st Year</option>
          <option value="2nd Year">2nd Year</option>
          <option value="3rd Year">3rd Year</option>
       </select>
       <div>
       <label for="">Select Date</label>
       <input type="date" name="date"max="<?php echo date('Y-m-d');?>" required id="dt">
       </div>
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
        <div id="ne">
            <div id="me">Select Course and Year</div>
        <input type="button" value="Save" name="save">
        </div>
    </form>
        
    </body>
</html>
<?php

?>
</body>
</html>
<script>
    $(document).ready(function()
    {
        
        // $('#ta').show();

      $('#yea').change(function(){
        var yid=$('#yea').val();
        var cid=$('#co').val();
        $.ajax({
             type:'POST',
             url:'attendanceviews.php',
             data:{
                yid:yid,
                cid:cid
            },
             success : function (data){
                $('#me').empty();
              $('#ne').html(data);
             }
        });
      });
      $('#co').change(function(){
        var yid=$('#yea').val();
        var cid=$('#co').val();
        $.ajax({
             type:'POST',
             url:'attendanceviews.php',
             data:{cid:cid,
            yid:yid
        },
             success : function (data){
                $('#me').empty();
              $('#ne').html(data);
             }
        });
      });
    $('#dt').change(function(){
        var yid=$('#yea').val();
        var cid=$('#co').val();
        var dt =$('#dt').val();
        $.ajax({
             type:'POST',
             url:'attendanceviews.php',
             data:{cid:cid,
            yid:yid,date:dt,
        },
             success : function (data){
                $('#me').empty();
              $('#ne').html(data);
             }
        });
      });
    });
    </script>