<?php
 $pw = 'satya';
 $hashed = password_hash($pw,PASSWORD_DEFAULT);
 echo $hashed;
 if(password_verify($pw, $hashed)){
 	echo 'true';

 } 
else {
	echo 'false';
}
?>