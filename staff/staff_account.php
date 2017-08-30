<?php
			session_start();
			
			include("db/db_config.php");
			
			$staff_id = $_SESSION['id'];
			$staff_phone = $_SESSION['phone'];
			$name = $_SESSION['name'];
			$dob = $_SESSION['date'];
			$marital = $_SESSION['marital'];
			$email = $_SESSION['email'];
			$dept = $_SESSION['depart'];
			$desig = $_SESSION['desig'];
			$salary = $_SESSION['salary'];
			$commission = $_SESSION['comi'];
			$bank = $_SESSION['bank'];
			$account = $_SESSION['acct_no'];




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staff Account</title>
<style>
			div{border:1px solid #000;
				height:50px;
				width:400px;
				background-color:#F00;}
				
			div a{font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
				font-size:18px;
				display:inline-block;
				text-decoration:none;
				text-transform:uppercase;
				padding:20px;
				border-left:1px solid #FFF;
				color:#fff;}
				
			div a:hover{background-color:#fff;
						color:#f00;}



</style>
</head>

<body>
		<h3>Swap Space Hospitals</h3>
        <p><em>World Class Medical Services</em></p>
        
        <?php
				echo '<p><strong>Staff ID:'.' '.$staff_id.'</strong></p>';
				echo '<p><strong>Phone Number:'.' '.$staff_phone.'</strong></p>';
		
		?>	
        
							<div>
				<a href="staff_home.php">Home</a>
                <a href="staff_account.php">Staff Account</a>
                <a href="staff_logout.php">Logout</a>
                			</div>
                
                
         <?php
				echo '<p><strong>Name:'.' '.$name.'</strong></p>';
				echo '<p><strong>Date of Birth:'.' '.$dob.'</strong></p>'; 
				echo '<p><strong>Marital Status:'.' '.$marital.'</strong></p>';
				echo '<p><strong>Email address:'.' '.$email.'</strong></p>';
				echo '<p><strong>Department:'.' '.$dept.'</strong></p>';
				echo '<p><strong>Designation:'.' '.$desig.'</strong></p>';
				echo '<p><strong>Salary:'.' '.$salary.'</strong></p>';
				echo '<p><strong>Commission:'.' '.$commission.'</strong></p>';
				echo '<p><strong>Bank:'.' '.$bank.'</strong></p>';
				echo '<p><strong>Account Number:'.' '.$account.'</strong></p>';
		
		
		?>	

</body>
</html>