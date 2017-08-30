<?php
		$db = mysqli_connect("localhost", "root", "", "hospital") or die(mysqli_error());



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Reg</title>
</head>

<body>

		<h3>Swap Space Hospitals</h3>
        
        <?php
        		
				if(array_key_exists('register', $_POST)) {
					
					$error = array();
					
				if(empty($_POST['admin'])) {
					$error[] = "Please input your ID";
					}else {
						$admin = mysqli_real_escape_string($db, $_POST['admin']);
						}
						
				if(empty($_POST['user']))   {
					$error[] = "Please input your username";
					}else {
						$user = mysqli_real_escape_string($db, $_POST['user']);
						}
						
				if(empty($_POST['pass'])) {
					$error[] = "Please input your password";
					}else {
						$pass = mysqli_real_escape_string($db, $_POST['pass']);
						}
						
				if(empty($_POST['pword']))  {
					$error[] = "Please input your password again";
					}else {
						$pword = md5(mysqli_real_escape_string($db, $_POST['pword']));
						}
						
				if(empty($error)) {
					
					$query = mysqli_query($db, "INSERT INTO admin 
													VALUES(NULL,
															'".$user."',
															'".$pass."',
															'".$pword."')
															") or die(mysqli_error($db));
				
					echo '<p>Thank you for registering</p>';
					}
					
					else {
						
						foreach($error as $err)
						
						 {echo '<p>'.$err.'</p>';}
						
						}
					}
        
        
        
		
		?>
		
        <form action="" method="post">
       		
         <p>Admin ID: <input type="text" name="admin" size="30"/></p>
         <p>Username: <input type="text" name="user" size="30"/></p>
         <p>Password: <input type="text" name="pass" size="30"/></p>
         <p>Confirm Password: <input type="text" name="pword" size="30"/></p>
         
         <input type="submit" name="register" value="Click to Submit"/>   
        
</form>
</body>
</html>