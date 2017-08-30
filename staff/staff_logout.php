<?php 
				session_start();
				
				unset($_SESSION['id']);
				unset($_SESSION['name']);
				unset($_SESSION['gender']);
				unset($_SESSION['date']);
				unset($_SESSION['marital']);
				unset($_SESSION['phone']);
				unset($_SESSION['email']);
				unset($_SESSION['desig']);
				unset($_SESSION['salary']);
				unset($_SESSION['comi']);
				unset($_SESSION['bank']);
				unset($_SESSION['acct_no']);
				unset($_SESSION['depart']);
				
				
				header("Location:staff_login.php");




?>