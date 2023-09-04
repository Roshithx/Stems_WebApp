<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
if(isset($_POST['Add']))
{
    $Course_name=$_POST['Course_name'];
    $semester=$_POST['semester'];
    $subject=$_POST['subject'];
    $query="insert into subject_tb(Course_name,semester,subject)values('$Course_name','$semester','$subject')";
    $res=mysqli_query($con,$query);
    if($res==true)
    {
       
        ?>
        <script>
            alert("Added Sucessfully");
            window.location.href="subjectadd.php";
        </script>
        <?php
    
    }
}
?>