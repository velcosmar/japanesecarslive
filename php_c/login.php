<?php

include "database.php";

if(isset($_POST['submit'])){


    $mailusername = $_POST['username'];
    $password = $_POST['password'];

    if(empty($mailusername) || empty($password))
    {
        header("Location:../login.php?error=emptyfield");
        exit();
    }else{

        $sql = "SELECT * FROM users WHERE email=? OR username=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:../login.php?error=sqlerror");
            exit();
        }else{

            mysqli_stmt_bind_param($stmt,"ss",$mailusername,$mailusername);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){

                $pwdCheck = password_verify($password, $row['password']);

                if($pwdCheck == false){
                    header("Location:../login.php?error=wrongpassword");
                    exit(); 
                }else if($pwdCheck == true){

                    session_start();
                    $_SESSION['user']=$row['username'];

                    header("Location:../index.php?login=success");
                    exit();

                    
                }else{

                    header("Location:../login.php?error=wrongpasswordeternal");
                    exit();
                }

            }else{
                header("Location:../login.php?error=nouser");
                exit();
            }

        }

    }

}else{
    header("Location:../signup.php");
    exit();
}