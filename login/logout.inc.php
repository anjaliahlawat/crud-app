<?php

   	session_start();
	session_unset();
	session_destroy();
	header("Location:http://localhost:81/CRUD/softlinkasia.php");

?>