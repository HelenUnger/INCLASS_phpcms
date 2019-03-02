<?php 
    require_once('script/config.php');
    confirm_logged_in();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <h2>Welcome <?php echo $_SESSION['user_name']?></h2>

    <nav>
        <ul>
            <li><a href="admin_createuser.php">create user</a></li>
            <li><a href="admin_edituser.php">edit user</a></li>
            <li><a href="#">delete user</a></li>
            <li><a href="?caller_id=logout">sign out</a></li>
        </ul>
    </nav>
</body>
</html>