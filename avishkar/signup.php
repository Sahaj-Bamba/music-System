<?php 

include 'connection.php';
include 'Vars.php'; 
/*		Form validation					*/

// define variables and set to empty values


$name = $email = $gender = $address = $phone_number = $type = $password = "";
$emailErr = $Repeat = $passErr = " ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);

  $phone_number = test_input($_POST["phone"]);

  $password = test_input($_POST["password"]);
  $type = test_input("user");

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  	$emailErr = "Invalid email format";
    $_SESSION["emailErr"] = $emailErr;
    $_SESSION["Er"] = "ERRORS";    
    header('location:Signup_.php');                       //  Return to signup page if there is any error
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  
  //  For commas and other special characters

  $name = mysqli_real_escape_string($con, $_POST["name"]);
  $email = mysqli_real_escape_string($con, $_POST["email"]);

  $phone_number = mysqli_real_escape_string($con, $_POST["phone"]);

  $password = mysqli_real_escape_string($con, $_POST["password"]);
  $type = mysqli_real_escape_string($con, "user");




// define variables and set to empty values

/*
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $address = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

*/

/*		Check for all errors				*/

      //  Password error

if (strlen($password)<6||strlen($password)>15) {
  $passErr = "Password must be between 6 and 15 characters long ";
  $_SESSION['passErr'] = $passErr;
  $_SESSION['Er'] = "ERRORS";
  header('location:Signup_.php');
}

	 
  //  Duplicate user check via phone number and email

  $sql = "SELECT * FROM user WHERE email = '$email' OR phone_number = '$phone_number' ;";

  $Res = $con->query($sql);
    echo "$Res->num_rows";
  if ($Res->num_rows > 1) {

            //user already present trying to resign in so not allowed
      echo "hell";
      $Repeat = "The given email or phone number is already in use by someone else try different ones. ";
      $_SESSION["Repeat"] = $Repeat;
    $_SESSION["Er"] = "ERRORS";
    echo hell;    
    header('location:Signup_.php');                       //  Return to signup page 

  }

  $password = md5($password);                             //   md5 encryption

  $sql = "INSERT INTO users (username , password , email , phone_number , type  , bio) VALUES ('$name','$password','$email','$phone_number','$type', ' ' ) ;";

  $con->query($sql);

/*
	if ($con->query($sql) === TRUE) {
	    $last_id = $con->insert_id;  
	                                   //  echo "New record created successfully. Last inserted ID is: " . $last_id;
	} else {
	    echo "Error: " . $sql . "<br>" . $con->error;
	}
*/

	$_SESSION["ID"] = $con->insert_id;

  header('location:index.php');

?>