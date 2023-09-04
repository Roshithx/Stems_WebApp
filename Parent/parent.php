<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
if(isset($_POST['Register']))
{
    $studentname=$_POST['studentname'];
    $parentname=$_POST['parentname'];
    $department=$_POST['department'];
    $course=$_POST['course'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $contact=$_POST['contact'];
    $query="insert into parent_tb(studentname,parentname,department,course,username,password,contact)values('$studentname','$parentname','$department','$course','$username','$password','$contact')";
    $res=mysqli_query($con,$query);
    if($res==true)
    {
        echo "Inserted Successfully";
    }
}
?>