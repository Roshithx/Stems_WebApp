<?php
include('../connection.php');
$coa=$_POST['id'];
$e="select * from Course_tb where Department_name=$coa";
$cos=mysqli_query($con,$e);
while($r=mysqli_fetch_array($cos)){
    echo "<option value=".$r['id'].">".$r['Course_name']."</option>";
}