<?php
			session_start();
			
			include("db/db_config.php");
			
			$id = $_SESSION['id'];
			$phone = $_SESSION['phone'];
			$name = $_SESSION['name'];





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staff Home</title>
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
            
            			<hr/>
                        
                 <?php echo '<p><strong>Staff ID:'.' '.$id.'</strong></p>';
				 	   echo  '<p><strong>Phone Number:'.' '.$phone.'</strong></p>';
    				 ?>  
						
                        	<div>
                  <a href="staff_home.php">Home</a>
                  <a href="staff_account.php">My Account</a>
                  <a href="staff_logout.php">Logout</a>      
							</div>
                            
                     
           <?php echo '<h4>Welcome'.' '.$name.','.' '.'you can view your profile in the my accounts section.'.'</h4>'; ?>      
                            
                            
</body>
</html>