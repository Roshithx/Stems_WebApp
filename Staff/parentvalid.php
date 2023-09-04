<?php
include("../connection.php");
$serr=$parr=$derr=$cerr=$uerr=$perr=$corr=" ";
if(isset($_POST['Register']))
{
    $studentname=$_POST['studentname'];
    if(empty($studentname))
    {
       $serr="Name is Required";
    }
    elseif(!preg_match('/^[a-z A-Z]+$/',$studentname))
    {
        $serr="Name is Invalid";
    }
    else
    {
        $serr=true;
    }
    $parentname=$_POST['parentname'];
    if(empty($parentname))
    {
       $parr="Name is Required";
    }
    elseif(!preg_match('/^[a-z A-Z]+$/',$parentname))
    {
        $parr="Name is Invalid";
    }
    else
    {
        $parr=true;
    }
    $department=$_POST['department'];
    if($department=="")
    {
       $derr="Select a department";
    }
    else
    {
        $derr=true;
    }
    $course=$_POST['Course_name'];
    if($course=="")
    {
       $cerr="Select a course";
    }
    else
    {
        $cerr=true;
    }
    $username=$_POST['username'];
    $as="select * from staff_tb where username='$username'";
    $cons=mysqli_query($con,$as);
    $asu="select * from student_tb where username='$username'";
    $cony=mysqli_query($con,$asu);
    $asq="select * from parent_tb where username='$username'";
    $cona=mysqli_query($con,$asq);
    if(empty($username))
    {
       $uerr="Username is Required";
    }
    elseif(!preg_match('/^[a-z A-Z 0-9 @]+$/',$username))
    {
        $uerr="Character is Invalid";
    }
    elseif(mysqli_num_rows($cons)==0 && mysqli_num_rows($cony)==0 && mysqli_num_rows($cona)==0){
        $uerr=true;

    }
    else
    {
        $uerr=" Username Already exist";
    }
    $password=$_POST['password'];
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
    $contact=$_POST['contact'];
    if(empty($contact))
    {
       $corr="Number is Required";
    }
    elseif(!preg_match('/^[0-9]{10}+$/',$contact))
    {
        $corr="Number is Invalid";
    }
    else
    {
        $corr=true;
    }
    if($serr==1 && $parr==1 && $derr==1 && $cerr==1 && $uerr==1 && $perr==1 && $corr==1){
        $query="insert into parent_tb(studentname,parentname,department,course,username,password,contact)values('$studentname','$parentname','$department','$course','$username','$password','$contact')";
    $res=mysqli_query($con,$query);
    if($res==true)
    {
        ?>
        <script>
            alert("Registered Sucessfully");
        </script>
        <?php
    }
    }
    }  

?>