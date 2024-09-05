<?php 
session_start();
include_once "../../config.php";

// Checking if the login attempts counter is set in the session, initialize it to 0 if not.
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($username) && !empty($password)){
    $sql = mysqli_query($conn, "SELECT * FROM admin WHERE username = '{$username}'");
    
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $user_pass = md5($password);
        $enc_pass = $row['password'];
        
        if($user_pass === $enc_pass){
           
             // Reseting login attempts on successful login
             $_SESSION['login_attempts'] = 0;
             $_SESSION['uid'] = $row['uid'];
             echo "success";
        
        } else {
            // Incrementing login attempts on failed login
            $_SESSION['login_attempts']++;

            // Checking if the maximum number of login attempts is reached
            if ($_SESSION['login_attempts'] >= 7) {
                
                echo "Maximum login attempts reached. Please try again later.";
            } else {
                echo "Invalid password. Attempts left: " . (6 - $_SESSION['login_attempts']);
            }
        }
    } else {
        echo "Something went wrong! Please Try again";
    }
} else {
    echo "All input fields are required!";
}

