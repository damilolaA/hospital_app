<?php
		session_start();
		
		include("db/dc_config.php");
		
		$telephone = $_SESSION['phone'];
		
		
		$ask = mysqli_query($dc, "SELECT insurance FROM patient WHERE
											phone = '".$telephone."'
												") or die(mysqli_error($dc));
				
		

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Patient Account</title>
</head>

<body>
			<h3>Swap Space Hospitals</h3>
            <p>World Class Medical Services</p>
            
            <?php
					while($select = mysqli_fetch_array($ask)) {
						
						echo '<p>Phone Number:'.$telephone.'</p>';
						
						}
			
			
			
			
			?>
</body>
</html>