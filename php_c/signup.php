<?php
 include 'database.php';

    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $email = $_POST['mail'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        if(empty($username) || empty($email) || empty($password)|| empty($confirmpassword))
        {
            header("Location:../signup.php?error=emptyfield&username=".$username."&mail=".$email);
            exit();

        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
            
            header("Location:../signup.php?error=invalidemail");
            exit();
        
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            
            header("Location:../signup.php?error=invalidemail&username=".$username);
            exit();  
       
       }else if( !preg_match("/^[a-zA-Z0-9]*$/",$username)){
                
            header("Location:../signup.php?error=invalidusername&email=".$email);
            exit();

       }else if($password !== $confirmpassword){

            header("Location:../signup.php?error=passwordcheck&username=".$username."&email=".$email);
            exit();

       }else {
           $sql = "SELECT username FROM users WHERE username=?";
           $stmt = mysqli_stmt_init($conn);

           if(!mysqli_stmt_prepare($stmt,$sql)){

            header("Location:../signup.php?error=sqlerror");
            exit();

           } else{

               mysqli_stmt_bind_param($stmt,"s",$username);
               mysqli_stmt_execute($stmt);
               mysqli_stmt_store_result($stmt);
               $resultCheck = mysqli_stmt_num_rows($stmt);

               if($resultCheck > 0){

                    header("Location:../signup.php?error=userTaken&email=".$email);
                    exit();

               } else{

                    $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        
                        header("Location:../signup.php?error=sqlerror");
                        exit();

               } else{
                
                $hashePwd =password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashePwd);
                mysqli_stmt_execute($stmt);
                header("Location:../login.php?SIGNUP=SUCCESS");
                exit();

               }
           }
       }
        
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}else{
        header("Location:../signup.php");
    exit();
}