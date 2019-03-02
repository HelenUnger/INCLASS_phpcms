<?php 
    require_once('script/connect.php');
    require_once('script/config.php');
    confirm_logged_in();

    $id = $_SESSION['user_id'];
    $tbl = 'tbl_user';
    $col = 'user_id';

    $query = 'SELECT * FROM tbl_user WHERE user_id = :id';

    $found_user_set = $pdo->prepare($query);
    $result = $found_user_set->execute(
        array(
            ':id' => $id
            )
        );

    // if($found_user_set){
    //     $found_user = $found_user_set->fetch(PDO::FETCH_ASSOC);
    // }

    if(isset($_POST['submit'])){
        $fname = trim($_POST['fname']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);

        //validation
        if(empty($username) || empty($password)){
            $message = 'Please fill in the required fields!';
        }else{
            // //create user
            // $result = createUser($fname, $username, $password, $email);
            $result = 'userdata will be edited';
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
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>

    <?php if(!empty($message)):?>
    <p><?php echo $message; ?></p>
    <?php endif ?>

    
    <form action="admin_edituser.php" method="POST">
    <?php if($found_user = $found_user_set->fetch(PDO::FETCH_ASSOC)): ?>
        <label for="first-name">First Name</label>
        <input type="text" id="first-name" name="fname" value="<?php echo($found_user['user_fname']); ?>"><br><br>

        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?php echo($found_user['user_name']); ?>"><br><br>

        <label for="password">Password</label>
        <input type="text" id="password" name="password" value="<?php echo($found_user['user_pass']); ?>"><br><br> 
        <!-- change type to password -->

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo($found_user['user_email']); ?>"><br><br>
    <?php endif; ?>
        <button type="submit" name="submit" >Edit User</button>
    </form>
</body>
</html>