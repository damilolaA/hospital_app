<?php
		session_start();
		
		include("db/dc_config.php");
		
		$id = $_SESSION['id'];
		$name = $_SESSION['name'];
		$insure = $_SESSION['ins'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Patient Home </title>
</head>

<body>
			<h3>Swap Space Hospital</h3>
            <p>World Class Medical Services</p>
            
            
            <?php
				
				echo '<p><strong>Patient Name:'.' '.$name.'</p>';
				echo '<p><strong>Insurance Number:'.' '.$insure.'</p>';
			?>
            
            <hr/>
            
            	<a href="patient_home.php">Home</a>
                <a href="patient_account.php">My Account</a>
                <a href="patient_logout.php">Logout</a>

</body>
</html>