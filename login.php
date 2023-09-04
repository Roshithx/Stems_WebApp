<?php
include('loginchecks.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <h1>Login</h1>
        <div>
            <label for="">Username</label>
            <input type="text" name="username">
            <strong style="color:red">
           <?php
           if($uerr!=1)
           {
            echo $uerr;
           }
           ?>
           </strong>
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password">
            <strong style="color:red">
            <?php
            if($perr!=1)
             {
              echo $perr;
             }
            ?>
            </strong>
        </div>
        <div>
            <input type="submit" value="login" name="Login">
        </div>
    </form>
</body>
</html>