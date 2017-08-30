<?php
		session_start();
		
		include("db/db_config.php");




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staff Login</title>
</head>

<body>
			<h3>Swap Space Hospitals</h3>
            <p><em>World Class Medical Services</em></p>
            
            <?php 
            
            	if(array_key_exists('login', $_POST))  {
					
					$error = array();
					
				if(empty($_POST['tele']))  {
					$error[] = 'Please input your phone number';
					}else {
						$tele = mysqli_real_escape_string($db, $_POST['tele']);
						}
						
				if(empty($_POST['pass']))  {
					$error[] = 'Please enter your password';
					}else {
						$pass = md5(mysqli_real_escape_string($db, $_POST['pass']));
						}
						
				if(empty($error))  {
					
					
				$query = mysqli_query($db, "SELECT * FROM staff WHERE
														phone = '".$tele."' AND
														password = '".$pass."'
														") or die (mysqli_error($db));
														
					if(mysqli_num_rows($query) == 1) {
						
						
					while($select = mysqli_fetch_array($query)) {
						
						$_SESSION['id'] = $select['staff_id'];
						$_SESSION['name'] = $select['firstname'].' '.$select['lastname'];
						$_SESSION['gender'] = $select['gender'];
						$_SESSION['date'] = $select['dob'];
						$_SESSION['marital'] = $select['marital'];
						$_SESSION['phone'] = $select['phone'];
						$_SESSION['email'] = $select['email'];
						$_SESSION['desig'] = $select['designation'];
						$_SESSION['salary'] = $select['salary'];
						$_SESSION['comi'] = $select['commission'];
						$_SESSION['bank'] = $select['bank'];
						$_SESSION['acct_no'] = $select['account_number'];
						$_SESSION['depart'] = $select['department'];
						

						header("Location:staff_home.php");
						}
						
						}else {
							
							$login_error = "Invalid telephone or/and password";
							header("Location:staff_login.php?login_error=$login_error");
							}
												
					}else {
						
						foreach($error as $error)  {
							
							echo '<p>'.$error.'</p>';}						
						
						}				
				
				}
   				
					if(isset($_GET['login_error'])) {
						
						echo $_GET['login_error'];}
				
            
            
            ?>
            
            <fieldset><legend>Enter your phone number and password to login</legend>
            <form action="" method="post">
       				
                    <P>Telephone Number:<input type="text" name="tele" size="40" /></P>
                    <p>Password:<input type="password" name="pass" size="40"  /></p>
                    
                    <input type="submit" name="login" value="Click to Login" />    
            
		
</form>
</fieldset>
</body>
</html>