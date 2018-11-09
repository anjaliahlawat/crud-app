<?php
    session_start();
    include_once "dbh.inc.php";
    if (isset($_POST['save_pwd']))
    {
    	$user_id = $_SESSION['user_id'];
    	$old_pwd = $_POST['old_pwd'];
    	$new_pwd = $_POST['new_pwd'];
    	if(empty($old_pwd) || empty($new_pwd))
    	{
    		header("Location:http://localhost/CRUD/login/setting.php?form=emptyfield");
            exit();
    	}
    	else
    	{
    		 $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
             $result = mysqli_query($conn, $sql);
             $row = mysqli_fetch_assoc($result);
    		 $hashedPwdCheck = password_verify($old_pwd, $row['user_password']);
             if ($hashedPwdCheck == false)
             {
                 echo "<p>Password entered doesn't match.</p>";  
             }
             elseif($hashedPwdCheck == true)
             {
    		    $hashedPwd = password_hash($new_pwd, PASSWORD_DEFAULT);
    	        $sql2 = "UPDATE users SET user_password='$hashedPwd' WHERE user_id = '$user_id'";
                if(mysqli_query($conn, $sql2))
               {
                   header("Location:http://localhost/CRUD/login/setting.php");
                   exit();
                   echo "<p>Password changed successfully</p>";
               } 
                else 
               {
                  echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
               }
            }    
    	}
    	
    }
    else
    {
    	header("Location:http://localhost/CRUD/login/setting.php");
        exit();
    }
?>
