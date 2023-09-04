<?php
$con=new mysqli("localhost","root","",'admin_db');
if($con->connect_error)
{
    die("Connection failed");

}
session_start();
$id=$_SESSION['id'];
$q="select * from parent_tb where id=$id";
$res=mysqli_query($con,$q);
$row=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <form action="parentupdate.php?id=<?php echo $id;?>" method="post">
    <div>
    <label for="studentname">Student Name</label>
    <input type="text" name="studentname" value="<?php echo $row['studentname'];?>">
    </div> 
    <div>
    <label for="parentname">Parent Name</label>
    <input type="text" name="parentname" value="<?php echo $row['parentname'];?>">
    </div> 
    <div>
        <label for="department">Department</label>
        <select name="department" id="">
            <option value="">Select</option>
            <option value="Computer science"
               <?php
                if($row['department']=='Computer science')
                {
                    echo "selected";
                } 
                ?>>Computer Science</option>
            <option value="English"
            <?php
                if($row['department']=='English')
                {
                    echo "selected";
                } 
                ?>>English</option>
            <option value="Commerce"
            <?php
                if($row['department']=='Commerce')
                {
                    echo "selected";
                } 
                ?>>Commerce</option>
            <option value="Psychology"
            <?php
                if($row['department']=='Psychology')
                {
                    echo "selected";
                } 
                ?>>Psychology</option>
            <option value="Malayalam"
            <?php
                if($row['department']=='Malayalam')
                {
                    echo "selected";
                } 
                ?>>Malayalam</option>
        </select>
    </div>
    <div>
        <label for="course">Course</label>
        <select name="course" id="">
            <option value="">Select</option>
            <option value="BCA"
               <?php
                if($row['course']=='BCA')
                {
                    echo "selected";
                } 
                ?>>BCA</option>
            <option value="BBA"
            <?php
                if($row['course']=='BBA')
                {
                    echo "selected";
                } 
                ?>>BBA</option>
            <option value="Bsc Computer science"
            <?php
                if($row['course']=='Bsc Computer science')
                {
                    echo "selected";
                } 
                ?>>Bsc Computer science</option>
            <option value="Bcom Cooperation"
            <?php
                if($row['course']=='Bcom Cooperation')
                {
                    echo "selected";
                } 
                ?>>Bcom Cooperation</option>
            <option value="Bcom Finance"
            <?php
                if($row['course']=='Bcom Finance')
                {
                    echo "selected";
                } 
                ?>>Bcom Finance</option>
            <option value="Bsc Psychology"
            <?php
                if($row['course']=='Bsc Psychology')
                {
                    echo "selected";
                } 
                ?>>Bsc Psychology</option>    
        </select>
    </div>
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo $row['username'];?>" disabled>
    </div>
        <label for="contact">Contact</label>
        <input type="text" name="contact" value="<?php echo $row['contact'];?>">
    </div>
    <div>
        <input type="submit" name="Register" value="Update">
    </div>
</form>
</body>
</html>