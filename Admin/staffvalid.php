<?php
include("../connection.php");
$nerr=$uerr=$perr=$derr=$corr=$err=" ";
if(isset($_POST['Register']))
{
    $filename=$_FILES['images']['name'];
    $filepath=$_FILES['images']['tmp_name'];
    $name=$_POST['name'];
    if(empty($name))
    {
       $nerr="Name is Required";
    }
    elseif(!preg_match('/^[a-z A-Z]+$/',$name))
    {
        $nerr="Name is Invalid";
    }
    else
    {
        $nerr=true;
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
    $username=$_POST['username'];
    $as="select * from staff_tb where username='$username'";
    $cons=mysqli_query($con,$as);
    $asu="select * from student_tb where username='$username'";
        $cony=mysqli_query($con,$asu);
        $asq="select * from parent_tb where username='$username'";
        $cona=mysqli_query($con,$asq);

 
    if(empty($username))
    {
       $uerr="Username Required";
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
       $corr="Contact is Required";
    }
    elseif(!preg_match('/^[0-9]{10}+$/',$contact))
    {
        $corr="Contact is Invalid";
    }
    else
    {
        $corr=true;
    }
    $email=$_POST['email'];
    if(empty($email)){
        $err="Email is Required";
    }
    else{
        $err=true;
    }
    if($nerr==1 && $derr==1 && $uerr==1 && $perr==1 && $corr==1 && $err==1){
        $query="insert into staff_tb(name,department,username,password,email,contact,images)values('$name','$department','$username','$password','$email','$contact','$filename')";
    $res=mysqli_query($con,$query);
    if($res==true)
    {
        move_uploaded_file($filepath,'../Images/'.$filename);
        ?>
        <script>
            alert("Registered Sucessfully");
        </script>
        <?php
    }
    }
    }
   

?>