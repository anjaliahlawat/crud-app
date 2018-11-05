<?php

if(isset($_POST['Register']))
{
	include_once 'dbh.inc.php';
	$username =  mysqli_real_escape_string($conn, $_POST['username']);
	$password =  mysqli_real_escape_string($conn, $_POST['password']);
	$code =  test_input($_POST['code']);
	$type = $_POST['select_type'];
    //error handlers
    //check for empty fields
    if (empty($username) || empty($password) || empty($code) || empty($type))
    {
        header("Location:register.php?register=empty");
        exit();
    }
    
    else
    {
        // check if input characters are valid
        if(!preg_match("/^[a-zA-Z]*$/", $username))
        {
        	header("Location:register.php?register=invalid");
	exit();
        }
        else
        {
             $sql = "SELECT  * FROM users WHERE user_name = '$username'";
             $result = mysqli_query($conn, $sql);
    		 $resultCheck = mysqli_num_rows($result);
             
    		 if( $resultCheck > 0)
    		 {
    		 	header("Location:register.php?register=usernametaken");
	            exit();
    		 }
    		 else 
    		 {
    		 	//hashing the password
    		 	$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    		 	//insert user into database
    		 	$sql = "INSERT INTO users (user_name, user_password, code, type) VALUES ('$username', '$hashedPwd', '$code', '$type')";
    		 	mysqli_query($conn, $sql);
    		    header("Location:softlinkasia.php");
    		 }
        }
    }

}

else {
	header("Location:register.php?register=fail");
	exit();
}

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>