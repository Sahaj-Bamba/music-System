<?php 
  include 'connection.php';
?>

<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="UTF-8">
        <title>Gen Next</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <link rel="stylesheet" type="text/css" href="style.css">

        <style>
            .error {color: #FF0000;}
        </style>
            
    </head>
    <body style="background-image: url(background.jpg);">
        <div class="box">
            <h2>Login</h2>
            
            <form action="signup.php" autocomplete="on" method="post">

                <div class="inputbox">
                    <input type="text" name="name" required>
                    <label>Username</lable>
                </div>

                <div class="inputbox">
                    <input type="text" name="phone" required>
                    <label>Phone Number</lable>
                </div>
                
                <div class="inputbox">
                    <input type="text" name="email" required>
                    <label>Email</lable>
                    
                </div>
                
                <div class="inputbox">
                    <input type="password" name="password" required>
                    <label>Password</lable>
                    <span class="error" style="font-size: 0.4em;"> 
                </div>
                
                <input type="submit" name="submit" value="Submit">
                <br>
                <div class="inputbox">
                    <label><?php $_SESSION['Er']; ?></lable>
                    <span class="error" > <?php echo $_SESSION["passErr"];?></span>     
                        <br>
                    <span class="error" > <?php echo $_SESSION["emailErr"];?></span>     
                        <br>
                    <span class="error" > <?php echo $_SESSION["Repeat"];?></span>     
                </div>
            </form>
        </div> 
    </body>
</html>
