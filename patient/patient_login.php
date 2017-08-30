<?php
		session_start();
		
		include("db/dc_config.php");




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Patient Login</title>
</head>

<body>
			<h3>Swap Space Hospitals</h3>
            <p>World Class Medical Services</p>
            
            <?php 
					if(array_key_exists('login', $_POST))	{
						
						$error = array();
						
					if(empty($_POST['ins']))  {
						$error[] = 'Please input insurance number';
						}else {
							$insure = mysqli_real_escape_string($dc, $_POST['ins']);
							}
							
					if(empty($_POST['pass'])) {
						$error[] = 'Please input your password';
						}else {
							$pword = md5(mysqli_real_escape_string($dc, $_POST['pass']));
							}
							
					if(empty($error))	{
						
						
						$ask = mysqli_query($dc, "SELECT * FROM patient WHERE
																insurance = '".$insure."' AND
																password = '".$pword."'
																") or die(mysqli_error($dc));
																
							if(mysqli_num_rows($ask) == 1){
								
							
							while($select = mysqli_fetch_array($ask)){
								
								
								$_SESSION['id'] = $select['patient_id']; 
								$_SESSION['name'] = $select['firstname'].' '.$select['lastname'];
								$_SESSION['ins'] = $select['insurance'];
								$_SESSION['phone'] = $select['phone'];
								
									header("Location:patient_home.php");
								}	
								
								}else {
									
									$login_error = 'Invalid insurance number or/and password';
									header ("Location:patient_login.php?login_error=$login_error");
									
									
									}
																
							}else {
								
								foreach($error as $error) {
									
									echo '<p>'.$error.'</p>';}
								}	
						
						}
 						
							if(isset($_GET['login_error'])) {
								
								echo $_GET['login_error'];
								}
            
            
            ?>
            
            <form action="" method="post">
				
               <p>Insurance Number:<input type="text" name="ins" size="30" /></p>
               
               <p>Password:<input type="password" name="pass" size="30" /></p>
               
               <input type="submit" name="login" value="Click to Login" />
                

				
</form>
</body>
</html>