<?php
		session_start();
		
		include("db/db_config.php");
		
		
		


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin_hosp Login</title>
</head>

<body>
			
            <h3>Swap Space Hospitals</h3>
            <p><em>World Class Medical Services</em></p>
            				<br/>
                            
                  <P>Admin Login: Please fill in your Username and Password</P>
            	
            <?php
			
				if(array_key_exists('submit', $_POST)) {
					
					$error = array();
					
				if(empty($_POST['user'])) {
					$error[] = "Fill in your username";
					}else {
						$user = mysqli_real_escape_string($db, $_POST['user']);
						}
						
				if(empty($_POST['pass'])) {
					$error[] = "Fill in your password";
					}else {
						$pass = md5(mysqli_real_escape_string($db, $_POST['pass']));
						}
						
				if(empty($error)) {
					
					
					$query = mysqli_query($db, "SELECT * FROM admin WHERE
													username = '".$user."' AND
													secured_password = '".$pass."'
													") or die(mysqli_error($db));
													
						if(mysqli_num_rows($query) == 1) {
							
							
						while($result = mysqli_fetch_array($query)){
							
							
							$_SESSION['id'] = $result['admin_id'];
							$_SESSION['user'] = $result['username'];	
							
							header("Location:admin_home.php");						
							}
					
							}else {
								
						$login_error = "Invalid username and/or password";
						header("Location:admin_login.php?login_error=$login_error");									
								
								}
					
					} else {
						
						foreach($error as $err){
							
							echo '<p>'.$err.'</p>';
							}
						
						}
				
				}
            
            if(isset($_GET['login_error'])) {
				
				echo $_GET['login_error'];
				}
			
			
			
			?>
            <form action="" method="post">
            
            <p>Username:<input type="text" name="user" size="30"/></p>
            <p>Password: <input type="text" name="pass" size="30" /></p>
            
            <input type="submit" name="submit" value="Click to Login" />
    
    

</form>    
</body>
</html>