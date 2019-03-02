<?php 


function login($username, $password, $ip){
    require_once('connect.php');

    //check if user exists

    $check_exist_query = 'SELECT COUNT(*) FROM tbl_user WHERE user_name = :usrnm';
    $user_set = $pdo->prepare($check_exist_query);

    $user_set->execute(
        array(
            ':usrnm'=>$username
            )
    );

    if($user_set->fetchColumn() > 0){
        // echo 'user exists';
        $get_user_query = 'SELECT * FROM tbl_user WHERE user_name = :usrnm AND user_pass = :pass';
        $get_user_set = $pdo->prepare($get_user_query);

        $get_user_set->execute(
            array(
                ':usrnm'=>$username,
                ':pass'=>$password
                )
        );

        while($found_user = $get_user_set->fetch(PDO::FETCH_ASSOC)){
            $id = $found_user['user_id'];
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $found_user['user_fname'];

        //     //
        //     $update_ip_query = 'UPDATE tbl_user SET user_ip = :ip WHERE user_id = :id';
        //     $update_ip_set = $pdo->prepare($update_ip_query);
        //     $update_ip_set->execute(
        //     array(
        //         ':ip' => $ip,
        //         ':id' => $id
        //         )
        // );
        }

        if(empty($id)){
            $message = 'Login Failed';
            return $message;
        }

        redirect_to('index.php');
    }else{
        $message = 'user does not exist';
        return $message;
    }


    //check if match
}

?>