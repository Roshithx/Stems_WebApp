<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
$uerr=$perr=" ";
if(isset($_POST['Login']))
{
$username=$_POST['username'];
$password=$_POST['password'];
if(empty($username))
    {
       $uerr="Enter Valid Character";
    }
    elseif(!preg_match('/^[a-z A-Z 0-9 @]+$/',$username))
    {
        $uerr="Character is Invalid";
    }
    else
    {
        $uerr=true;
    }
    if(empty($password))
    {
       $perr="Enter Valid Character";
    }
    elseif(!preg_match('/^[a-z A-Z 0-9 @]+$/',$password))
    {
        $perr="Character is Invalid";
    }
    else
    {
        $perr=true;
    }
    if($uerr==1 && $perr==1)
    {
        $que="select * from admin_tb where username='$username' and password='$password'";
       $for=mysqli_query($con,$que);
       if(mysqli_num_rows($for)>0){
       $row=mysqli_fetch_array($for);
       session_start();
       $_SESSION["username"]=$row['username'];
       $_SESSION["id"]=$row['id'];

       header("location:Admin/adminhome.html");

}
else{
$que="select * from staff_tb where username='$username' and password='$password'";
$form=mysqli_query($con,$que);
if(mysqli_num_rows($form)>0){
    $row=mysqli_fetch_array($form);
    session_start();
    $_SESSION["username"]=$row['username'];
    $_SESSION["id"]=$row['id'];

    header("location:Staff/staffhome.html");

}
else{
    $quer="select * from student_tb where username='$username' and password='$password'";
    $forms=mysqli_query($con,$quer);
   if(mysqli_num_rows($forms)>0){
    $row=mysqli_fetch_array($forms);
    session_start();
    $_SESSION["username"]=$row['username'];
    header("location:Student/studenthome.html");
}
else{
    $qua="select * from parent_tb where username='$username' and password='$password'";
    $forma=mysqli_query($con,$qua);
   if(mysqli_num_rows($forma)>0){
    $row=mysqli_fetch_array($forma);
    session_start();
    $_SESSION["username"]=$row['username'];
    header("location:Parent/parenthome.html"); 
}
else {
    ?>
    <script>
        alert("Invalid Username");
    </script>
    <?php
    // <!-- header("location:login.php"); -->
}
}
}
}
}
}
?>