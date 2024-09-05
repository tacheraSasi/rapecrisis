<?php 
  session_start();
  if(isset($_SESSION['uid'])){
    header("location: ./");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUWK Login</title>
    <link rel="stylesheet" href="css/admin.css">
    <style>
        .error-text{
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h1 class="title">TUWK - Admin</h1>
            <form  action="#" method="POST"  class="create-groove-form">
                <div class="error-text" style="
                      background-color: rgba(243, 89, 89, 0.562);
                      color:#fff;
                      padding:6px;
                      border-radius:8px">
                    </div>
                  <div class=" field input-group">
                    <input style="width: 100%;" type="text" name="username"  placeholder="Admin username" required>
                  </div>
                  <div class=" field input-group">
                    <input style="width: 100%;" type="password" name="password"  placeholder="Admin password" required>
                  </div>
                  
                  <div class="input-container field button ">
                      <button  id="submit" class="login-btn" type="submit">Sign in</button>
                  </div>
                  
        
            </form>
        </div>
    </div>
    <script src="javascript/login.js"></script>
</body>
</html>
