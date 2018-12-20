<?php
include_once "dbh.inc.php";
session_start();
if(isset($_POST['submit_form_hr']))
{
  $emp_id = $_POST['emp_id'];
	$name = $_POST['name'];
	$designation = $_POST['designation'];
	$qualification = $_POST['qualification'];
	$experience_prior = $_POST['experience_prior'];
  $experience_current = $_POST['experience_current'];
	$job_resp = $_POST['job_resp'];
	$area_of_exp = $_POST['area_of_exp'];

	if(empty($emp_id) || empty($name) || empty($designation) || empty($qualification) || empty($job_resp) || empty($area_of_exp))
	{
		 header("Location:http://localhost/CRUD/home.php?form=emptyfields1");
     exit();
	}
	else 
	{		
   	  $sql2 = "INSERT INTO hr_table(emp_id, name, designation, qualification, experience_prior, experience_current, job_resp, area_of_exp) VALUES('$emp_id', '$name', 'designation', '$qualification', '$experience_prior', '$experience_current', '$job_resp', '$area_of_exp')";
      if(mysqli_query($conn, $sql2))
      {
          echo "New record created successfully";
      } 
      else 
      {
          echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
      }
      
	}
}
else if(isset($_POST['submit_form_tr']))
{    
	  $name = $_POST['name'];
  	$designation = $_POST['designation'];
  	$topic = $_POST['topic'];
  	$cadre = $_POST['cadre'];
  	$months = $_POST['months'];
    $status = $_POST['status'];
    $faculty = $_POST['faculty'];
    $trainee_name = $_POST['trainee_name'];
    $venue = $_POST['venue'];
    $date = $_POST['t_date'];
    $time = $_POST['t_time'];
    $rating = $_POST['rating'];

    if(empty($name) || empty($designation) || empty($topic) || empty($cadre) || empty($months) || empty($status) || empty($faculty) || empty($trainee_name) || empty($venue) || empty($date) || empty($time) || empty($rating))
    {
    	header("Location:http://localhost/CRUD/home.php?form=emptyfields1");
        exit();
    }
    else 
    {
    		$sql = "INSERT INTO training_table(name, designation, cadre, months, status, faculty, trainee_name, venue, t_date, t_time, topic, rating) VALUES('$name', '$designation', '$cadre', '$months', '$status', '$faculty', '$trainee_name', '$venue', '$date', '$time', '$topic', '$rating')";
    		if(mysqli_query($conn, $sql))
        {
            echo "New record created successfully";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    	
    }
}
else if(isset($_POST['emp_table_btn_save']))
{
    $emp_id = $_POST['emp_id'];
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $qualification = $_POST['qualification'];
    $experience_prior = $_POST['experience_prior'];
    $experience_current = $_POST['experience_current'];
    $job_resp = $_POST['job_resp'];
    $area_of_exp = $_POST['area_of_exp'];
    $id = $_POST['id'];

    if(empty($emp_id) || empty($name) || empty($designation) || empty($qualification) || empty($job_resp) || empty($area_of_exp))
    {
        header("Location:http://localhost/CRUD/home.php?form=emptyfields1");
        exit();
    }
    else
    {
        $sql = "UPDATE securelogin.hr_table SET emp_id='$emp_id', name='$name', designation='$designation', qualification='$qualification', experience_prior='$experience_prior', experience_current='$experience_current', job_resp='$job_resp', area_of_exp='$area_of_exp'  WHERE id='$id'";
        if(mysqli_query($conn, $sql))
        {
            header("Location:http://localhost/CRUD/home.php?form=success");
            exit();
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
else if(isset($_POST['emp_table_btn_del']))
{
    $id= $_POST['id'];
    $query ="DELETE FROM securelogin.hr_table WHERE id='$id'";
    if(mysqli_query($conn, $query))
    {
        header("Location:http://localhost/CRUD/home.php?form=success");
        exit();
    } 
    else 
    {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
else if(isset($_POST['t_table_btn_save']))
{
    $name = $_POST['name'];
    $designation = $_POST['designation'];    
    $cadre = $_POST['cadre'];
    $months = $_POST['months'];
    $status = $_POST['status'];
    $faculty = $_POST['faculty'];
    $trainee_name = $_POST['trainee_name'];
    $venue = $_POST['venue'];
    $date = $_POST['t_date'];
    $time = $_POST['t_time'];
    $topic = $_POST['topic'];
    $rating = $_POST['rating'];
    $id= $_POST['id'];
    if(empty($name) || empty($designation) || empty($topic) || empty($cadre) || empty($months) || empty($status) || empty($faculty) || empty($trainee_name) || empty($venue) || empty($date) || empty($time) || empty($rating))
    {
        header("Location:http://localhost/CRUD/home.php?form=emptyfields1");
        exit();
    }
    else
    {
        $sql = "UPDATE securelogin.training_table SET name='$name', designation='$designation', cadre='$cadre', months='$months', status='$status', faculty='$faculty', trainee_name='$trainee_name', venue='$venue', t_date='$date', t_time='$time', topic='$topic', rating='$rating' WHERE id='$id'";
        if(mysqli_query($conn, $sql))
        {
            echo "New record created successfully";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
else if(isset($_POST['t_table_btn_del']))
{
    $id= $_POST['id'];
    $query ="DELETE FROM securelogin.training_table WHERE id='$id'";
    if(mysqli_query($conn, $query))
    {
        header("Location:http://localhost/CRUD/home.php?form=success");
        exit();
    } 
    else 
    {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

?>