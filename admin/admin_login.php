<?php 
    //require_once('script/connect.php');
    require_once('script/config.php');

    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $ip = $_SERVER['REMOTE_ADDR'];

        $returnedMsg = login($username, $password, $ip);
    }else if (isset($_POST['username']) || isset($_POST['password'])){
        $returnedMsg = 'please fill in the required fields';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin login</title>
</head>
<body>

    <?php if(!empty($returnedMsg)):?>
    <p><?php echo $returnedMsg; ?></p>
    <?php endif ?>

    <form action="admin_login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">

        <button type="submit">Log In!</button>
    </form>
</body>
</html>