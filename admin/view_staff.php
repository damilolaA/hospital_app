<?php
		session_start();
		
		include("db/db_config.php");
		
		include("functions.php");
		
		$admin_id = $_SESSION['id'];
		$admin_name = $_SESSION['user'];




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Staff</title>
<style>
			div{border:1px solid #000;
				height:50px;
				width:700px;
				background-color:#C00;															
			}
			
			div a{text-decoration:none;
					color:#FFF;
					font-size:16px;
					font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
					padding:15px 10px;
					display:inline-block;
					text-transform:uppercase;
					border-left:1px solid #000;
					}
					
			div a:hover{background-color:#fff;
						color:#c00;}



</style>
</head>

<body>
			<h3>Swap Space Hospitals</h3>
            <p><em>World Class Medical Services</em></p>
            	
			
			<?php
					echo '<p><strong>Admin ID:'.' '.$admin_id.'</strong></p>';
					echo '<p><strong>Admin Username:'.' '.$admin_name.'</strong></p>';
			
			?>	
            	
                
                		<div>
            <a href="admin_home.php">Home</a>
            <a href="add_staff.php">Add Staff</a>
            <a href="view_staff.php">View Staff</a>
            <a href="add_patients.php">Add Patients</a>
            <a href="view_patients.php">View Patients</a>
            <a href="admin_logout.php">Logout</a>
            			</div>
            
            		<br/>
                    
            
             <?php 
			 
			 $result = mysqli_query($db, "SELECT * FROM staff") or die(mysqli_error($db)); 
			 
			 ?>  
             
             <h3>Staff Records</h3>
            
            <table border="1">
            
            <tr>
            
            <th>Name</th><th>Sex</th><th>Date of Birth</th><th>Marital Status</th><th>Phone Number</th><th>Department</th>
            <th>Designation</th><th>Salary</th><th>Bank</th><th>Account Number</th>
            
            </tr>
            
           		<?php 
					
					$check = viewStaff($result);
					echo $check;
				
				?>
  </table>          
</body>
</html>