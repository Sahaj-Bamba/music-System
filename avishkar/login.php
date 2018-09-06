<?php

    session_start();

    //if already logged in
    if(isset($_SESSION['loggedIn']))
    {
      header('Location: hidden.php');
      exit();
    }


    if(isset($_POST['login'])) //if login variable is set we will  then accept the data
    {
        $con= mysqli_connect("localhost", "root", "", "music");
        $username=mysqli_real_escape_string($con,$_POST['usernamePHP']);    // we have to escape our data for protection
        $password=mysqli_real_escape_string($con,$_POST['passwordPHP']);

        //now we have to just connect to our database and verify our data

        //now we will make a query to the database to verify our data
        $select_query="SELECT id,username,password FROM users WHERE username='$username' AND password='$password'";
        $select_query_submit=mysqli_query($con,$select_query)or die(mysqli_error($con));
        if(mysqli_num_rows($select_query_submit)>0)
          //every thing ok lets login 
        {
            $_SESSION['loggedIn']='1';
            $_SESSION['username']=$username;
            exit('success');
        }
        else
        {
            exit('Wrong Username or Password');
        }
    }
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <title>The Music World</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        
        <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
        
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="style.css">
        
    </head>
    <body>
        <div class="box">
            <h2>Login</h2>
            
            <form method="post" action="login.php">
                <div class="inputbox">
                    <input type="text" id="username" name="" required="">
                    <label>Username</lable>
                </div>
                <div class="inputbox">
                    <input type="password" id="password" name="" required="">
                    <label>Password</lable>
                </div>
                <input type="button" id="login" name="" value="Log In">   <!--type ="submit" is not compatible with jquery-->
                
            </form>
            <p id="response"></p>
        </div>

             <script
  src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>
    
    <!--this code gets the value from the form-->
    <script type="text/javascript">
        <!--this means that the function will execute once the document is fully loaded-->
        $(document).ready(function(){     
            //when the login buttin is pressed
            $("#login").on('click', function(){
               var username = $("#username").val();  //this method gets the username from the form
               var password = $("#password").val();
               
               
               //if the data is absent user alert box
               if(username == "" || password == "")
                   alert('Please check your inputs');
                 else{

                      //we will now send this data to  the server using ajax
               $.ajax(
                       {
                           url: 'login.php' , //the location where we have to send the data
                           method:'POST',     
                           data: {                       //data to be sent
                               login: 1,
                               usernamePHP: username,
                               passwordPHP: password
                           },
                           success: function(response){            //response that we will recieve by the server
                            
                              $("#response").html(response);   //to print the response
                              if(response.indexOf('success') >=0)  //if the respone contains word success the login
                                window.location='hidden.php';    //this will  take  the user to the hidden file after login
                           },
                           dataType: 'text'
                           
                       }
                   );
                 }
               
               
            });
        });
    </script>


    </body>
    
 
  
    
</html>
