<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
if(isset($_POST['Register']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query="insert into admin_tb(name,email,username,password)values('$name','$email','$username','$password')";
    $res=mysqli_query($con,$query);
    if($res==true)
    {
        echo "Inserted Successfully";
    }
}
?>