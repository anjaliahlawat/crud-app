
<?php

session_start();

if (isset($_POST['Login']))
{
	include_once 'dbh.inc.php';
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	//error handlers
	if (empty($username) || empty($password))
	{
        header("Location:http://localhost:81/CRUD/softlinkasia.php?login=empty");
	    exit();

       
	}
	else
	{
        if(!preg_match("/^[a-zA-Z]*$/", $username))
        {
            header("Location:register.php?register=invalid");
    exit();
        }
        else 
        {
             $sql = "SELECT * FROM users WHERE user_name = '$username'";
             $result = mysqli_query($conn, $sql);
             $resultCheck = mysqli_num_rows($result); 

             if ($resultCheck < 1)
             {
                header("Location:http://localhost/:81CRUD/softlinkasia.php?login=error1");
                exit();
             }
             else 
             {
                if ($row = mysqli_fetch_assoc($result))
                {
                    //dehashing the password
                    $hashedPwdCheck = password_verify($password, $row['user_password']);
                    if ($hashedPwdCheck == false)
                    {

                        header("Location:http://localhost:81/CRUD/softlinkasia.php?login=error2");
                        exit();
                    }
                    elseif($hashedPwdCheck == true)
                    {
                        //login 
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['username'] = $row['user_name'];
                        $_SESSION['code'] = $row['code'];
                        $_SESSION['type'] = $row['type'];
                        header("Location:http://localhost:81/CRUD/softlinkasia.php?login=success");
                        exit();
                    }
                }
             } 
        }
	    
	}
}
else
	{
	   header("Location:http://localhost:81/CRUD/softlinkasia.php?login=error3");
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