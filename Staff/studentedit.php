<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
$id=$_GET['id'];
$coc="select * from department_tb";
$cos=mysqli_query($con,$coc);
$coz="select * from course_tb";
$cod=mysqli_query($con,$coz);
$q="select *,department_tb.Department_name as did from student_tb inner join Course_tb on Course_tb.id=student_tb.course inner join department_tb on department_tb.id=Course_tb.Department_name where student_tb.id=$id";
$res=mysqli_query($con,$q);
$row=mysqli_fetch_array($res);
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
    <h1>Student Registration</h1>
    <div>
    <form action="studentupdate.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
    <label for="name">Name</label>
    <input type="text" name="name" value="<?php echo $row['name'];?>">
    </div>
    <div>
    <label for="">Reg No</label>
    <input type="text" name="Regno" value="<?php echo $row['Regno'];?>">
    </div>
    <div>
            <label for="department">Department</label>
            <select name="department" id="dep">
            <option value="">Select Department</option>
            <?php
             while($r=mysqli_fetch_array($cos)){
                ?>
             
            <option value="<?php echo $r['id'];?>"
              <?php
                if($row['department']==$r['id'])
                {
                    echo "selected";
                } 
                ?>> <?php echo $r['Department_name'];?></option>
                <?php
             }
             ?>
        </select>
     </div>
     <div>
        <label for="Course">Course</label>
        <select name="Course_name" id="cou">
         <option value="">Select Course</option>   
         <?php
         while($c=mysqli_fetch_array($cod)){
          ?>
          <option value="<?php echo $c['id'];?>"
          <?php
          if($c['id']==$row['course']){
           echo "selected";
          }?>><?php echo $c['Course_name'];?></option>
          <?php
         }
         ?>   
        </select>
    </div>
    <div >
    <label for="">Year</label>
        <select name="Year" id="">
            <option value="">Select Year</option>
            <option value="1st Year"
               <?php
                if($row['Year']=='1st Year')
                {
                    echo "selected";
                } 
                ?>>1st Year</option>
            <option value="2nd Year"
            <?php
                if($row['Year']=='2nd Year')
                {
                    echo "selected";
                } 
                ?>>2nd Year</option>
            <option value="3rd Year"
            <?php
                if($row['Year']=='3rd Year')
                {
                    echo "selected";
                } 
                ?>>3rd Year</option>
          
       </select>
       </div>
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo $row['username'];?>">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="text" name="password" value="<?php echo $row['password'];?>">
    </div>
    <div>
        <label for="image">Profile</label>
        <img src="../Images/<?php echo $row['images']; ?>" height="100px" width="100px" alt="">
        <input type="file" name="images" value="<?php echo $row['images'];?>">
    </div>
    <div>
        <input type="submit" name="Register" value="Update">
    </div>
</form>
</body>
</html>
<script>
      $('#dep').change(function(){
        var id=$('#dep').val();
        $.ajax({
             type:'POST',
             url:'courseselect.php',
             data:{id:id},
             success : function (data){
              $('#cou').html(data);
             }
        });
      });
    </script>