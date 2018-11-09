<?php
include_once "dbh.inc.php";
session_start();
if(isset($_POST['submit_form1']))
{
	$id = $_POST['id'];
	$name = mysqli_escape_string($conn, $_POST['name']);
	$designation = mysqli_escape_string($conn, $_POST['designation']);
	$qualification = mysqli_escape_string($conn, $_POST['qualification']);
	$experience = mysqli_escape_string($conn, $_POST['experience']);
	$job_resp = mysqli_escape_string($conn, $_POST['job_resp']);
	$area_of_exp = mysqli_escape_string($conn, $_POST['area_of_exp']);

	if( empty($name) || empty($designation) || empty($qualification) || empty($experience) || empty($job_resp) || empty($area_of_exp))
	{
		header("Location:http://localhost/CRUD/home.php?form=emptyfields1");
        exit();
	}
	else 
	{
		if(!preg_match("/^[a-zA-Z]*$/", $name) || !preg_match("/^[a-zA-Z]*$/", $designation) || !preg_match("/^[a-zA-Z]*$/", $job_resp) || !preg_match("/^[a-zA-Z]*$/", $area_of_exp))
		{
			header("Location:http://localhost/CRUD/home.php?form=invalid");
        exit();
		}
		else
		{
			$sql1 = "SELECT * FROM hr_table WHERE id = '$id'";
			$result1 = mysqli_query($conn, $sql1);
            $resultcheck = mysqli_num_rows($result1);
           if ($resultcheck > 0)
           {
               echo "<p class='error_message'> You're already registered. </p>";
           }
           else
           {
           	  $sql2 = "INSERT INTO hr_table(employee_id, name, designation, qualification, experience, job_resp, area_of_exp) VALUES('$employee_id', '$name', 'designation', '$qualification', '$experience', '$job_resp', '$area_of_exp')";
           	  mysqli_query($conn, $sql2);
           }
		}
	}
}
else if(isset($_POST['submit_form2']))
{
	$name = mysqli_escape_string($conn, $_POST['name']);
	$designation = mysqli_escape_string($conn, $_POST['designation']);
	$topic = mysqli_escape_string($conn, $_POST['topic']);
	$cadre = mysqli_escape_string($conn, $_POST['cadre']);
	$months = $_POST['months'];
    $status = mysqli_escape_string($conn, $_POST['status']);
    $faculty = mysqli_escape_string($conn, $_POST['faculty']);
    $trainee_name = mysqli_escape_string($conn, $_POST['trainee_name']);
    $venue = mysqli_escape_string($conn, $_POST['venue']);
    $date = $_POST['date'];
    $time = $_POST['time'];
    $rating = mysqli_escape_string($conn, $_POST['rating']);

    if(empty($name) || empty($designation) || empty($topic) || empty($cadre) || empty($months) || empty($status) || empty($faculty) || empty($trainee_name) || empty($venue) || empty($date) || empty($time) || empty($rating))
    {
    	header("Location:http://localhost/CRUD/home.php?form=emptyfields1");
        exit();
    }
    else 
    {
    	if(!preg_match("/^[a-zA-Z]*$/", $name) || !preg_match("/^[a-zA-Z]*$/", $designation) || !preg_match("/^[a-zA-Z]*$/", $topic) || !preg_match("/^[a-zA-Z]*$/", $cadre) || !preg_match("/^[a-zA-Z]*$/", $status) || !preg_match("/^[a-zA-Z]*$/", $faculty) || !preg_match("/^[a-zA-Z]*$/", $trainee_name) || !preg_match("/^[a-zA-Z]*$/", $designation) || !preg_match("/^[a-zA-Z]*$/", $rating))
    	{
    		header("Location:http://localhost/CRUD/home.php?form=invalid");
        exit();
    	}
    	else
    	{
    		$sql = "INSERT INTO training_table(name, designation, topic, cadre, months, status, faculty, trainee_name, venue, date, time, rating) VALUES('$name', '$designation', '$topic', '$cadre', '$months', '$status', '$faculty', '$trainee_name', '$venue', '$date', '$time', '$rating')";
    		mysqli_query($conn, $sql);
    	}
    }
}

?>