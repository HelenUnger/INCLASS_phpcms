<?php 
    require_once('script/config.php');
    confirm_logged_in();

    if(isset($_POST['submit'])){
        $fname = trim($_POST['fname']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);

        //validation
        if(empty($username) || empty($password)){
            $message = 'Please fill in the required fields!';
        }else{
            //create user
            $result = createUser($fname, $username, $password, $email);
            $message = $result;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
</head>
<body>
    <?php if(!empty($message)):?>
    <p><?php echo $message; ?></p>
    <?php endif ?>

    <h2>create user</h2>

    <form action="admin_createuser.php" method="POST">
        <label for="first-name">First Name</label>
        <input type="text" id="first-name" name="fname" value=""><br><br>

        <label for="username">Username</label>
        <input type="text" id="username" name="username" value=""><br><br>

        <label for="password">Password</label>
        <input type="text" id="password" name="password" value=""><br><br> 
        <!-- change type to password -->

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value=""><br><br>

        <button type="submit" name="submit" >Add User</button>
    </form>

</body>
</html>