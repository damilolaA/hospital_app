<?php 
		session_start();
		
		include("db/db_config.php");
		
		$admin_id = $_SESSION['id'];
		$admin_name = $_SESSION['user'];
		
		$department = array("Administration", "Finance & Accounts", "General Consultancy", "Surgicals", "Pediatrics");
		
		$bank = array("Access Bank", "First Bank", "GTBank", "Eco Bank", "Zenith Bank",);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Staff</title>
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
                    <br/>
            
                
            
            <?php
				
				if(array_key_exists('add', $_POST))  {
					
					$error = array();
					
				if(empty($_POST['fname'])) {
					$error[] = 'Please fill in firstname';
					}else {
						$fname = mysqli_real_escape_string($db, $_POST['fname']);
						}
						
				if(empty($_POST['lname']))  {
					$error[] = 'Please fill in your lastname';
					}else {
						$lname = mysqli_real_escape_string($db, $_POST['lname']);
						}
						
				if(empty($_POST['sex']))  {
					$error[] = 'Please select gender';
					}else {
						$sex = mysqli_real_escape_string($db, $_POST['sex']);
						}
						
				if(empty($_POST['day'])) {
					$error[] = 'Select day of birth';
					}else {
						$dy = mysqli_real_escape_string($db, $_POST['day']);
						}
						
				if(empty($_POST['month']))  {
					$error[] = 'Select month of birth';
					} else {
						$mon = mysqli_real_escape_string($db, $_POST['month']);
						}
						
				if(empty($_POST['year']))  {
					$error[] = 'Select year of birth';
					} else {
						$yr = mysqli_real_escape_string($db, $_POST['year']);
						}
						
				if(empty($_POST['marital']))  {
					$error[] = 'Select marital status';
					} else {
						$marital = mysqli_real_escape_string($db, $_POST['marital']);
						}
						
				if(empty($_POST['phone']))  {
					$error[] = 'Fill in phone number';
					} else {
						$phone = mysqli_real_escape_string($db, $_POST['phone']);
						}
						
				if(empty($_POST['email']))  {
					$error[] = 'Fill in email address';
					} else {
						$email = mysqli_real_escape_string($db, $_POST['email']);
						}
						
				if(empty($_POST['dept']))  {
					$error[] = 'Select department';
					} else {
						$dept = mysqli_real_escape_string($db, $_POST['dept']);
						}
						
				if(empty($_POST['desig']))  {
					$error = 'Select designation';
					} else {
						$desig = mysqli_real_escape_string($db, $_POST['desig']);
						}
						
				if(empty($_POST['sala']))  {
					$error[] = 'Input salary';
					} else {
						$sala = mysqli_real_escape_string($db, $_POST['sala']);
						}
						
				if(empty($_POST['comi']))  {
					$error[] = 'Input commission';
					} else {
						$comi = mysqli_real_escape_string($db, $_POST['comi']);
						}
						
				if(empty($_POST['bank']))  {
					$error[] = 'Select Bank';
					} else  {
						$bank = mysqli_real_escape_string($db, $_POST['bank']);
						}
						
				if(empty($_POST['acct']))  {
					$error[] = 'Input account number';
					} else {
						$acct = mysqli_real_escape_string($db, $_POST['acct']);
						}
						
				if(empty($_POST['pass']))  {
					$error[] = 'Input staff password';
					}else {
						$pass = md5(mysqli_real_escape_string($db, $_POST['pass']));
						}
						
				if(empty($error))  {
					
					$query = mysqli_query($db, "INSERT INTO staff 
													VALUES(NULL,
															'".$fname."',
															'".$lname."',
															'".$sex."',
															'".$yr.'-'.$mon.'-'.$dy."',
															'".$marital."',
															'".$phone."',
															'".$email."',
															'".$dept."',
															'".$desig."',
															'".$sala."',
															'".$comi."',
															'".$bank."',
															'".$acct."',
															'".$pass."')
															") or die(mysqli_error($db));
					
					$success = "Staff Successfully Added";
					
					header("Location:add_staff.php?success=$success");
					
					} else {
						
						foreach ($error as $err) {
							
							echo '<p>'.$err.'</p>';	
							}
						
						}		
									
				}
				
						
						if(isset($_GET['success'])) {
							
							echo '<p>'.$_GET['success'].'</p>';
							}
					
					
			?>
			
			<form action="" method="post">
            
            <fieldset><legend>Add staff of Swap Space Hospital</legend>
            
            
            	<p>First Name: <input type="text" name="fname" size="40" 
                				value="<?php if(isset($_POST['fname'])) {echo $_POST['fname'];}?>" /></p>
                
                <p>Last Name: <input type="text" name="lname" size="40" 
                				value="<?php if(isset($_POST['lname'])) {echo $_POST['lname'];}?>" /></p>
                
                <p>Gender: Male<input type="radio" name="sex" value="male" 
                				<?php if(isset($_POST['sex']) && $_POST['sex'] == "male")
										{echo 'checked="checked"';}?>/>
                				
                			Female <input type="radio" name="sex" value="female" 
                            	<?php if(isset($_POST['sex']) && $_POST['sex'] == "female")
										{echo 'checked="checked"';}?>/>
                            					</p>
                                                
                 <p>Date of Birth: <select name="day">
                 					<option value="">Select Day</option>
                                    <?php for($dy=1; $dy<=31; $dy++) {?>
                                    
                                    <option value="<?php echo $dy?>"
                                    <?php if(isset($_POST['day']) && $_POST['day'] == "$dy")
										{echo 'selected="selected"';}?>>
									
									<?php echo $dy?></option>
                                    <?php }?>
                                    </select>
                                    
                                    <select name="month">
                                    <option value="">Select Month</option>
                                    <?php for($mon=1; $mon<=12; $mon++) {?>
                                    
                                    <option value="<?php echo $mon?>"
                                    <?php if(isset($_POST['month']) && $_POST['month'] == "$mon")
										{echo 'selected="selected"';}?>>
									
									<?php echo $mon?></option>
                                    <?php }?>
                                    </select>
                                    
                                    <select name="year">
                                    <option value="">Select Year</option>
                                    <?php for($yr=1990; $yr<=2017; $yr++) {?>
                                    
                                    <option value="<?php echo $yr?>"
                                    <?php if(isset($_POST['year']) && $_POST['year'] == "$yr")
										{echo 'selected="selected"';}?>>
									
									<?php echo $yr?></option>
                                    <?php }?>
                                    </select>
                                    </p>
                                    
                   <p>Marital Status: Single<input type="radio" name="marital" value="single"
                   						<?php if(isset($_POST['marital']) && $_POST['marital'] == "single")
											{echo 'checked="checked"';}?> />
                   
                   					  Married<input type="radio" name="marital" value="married"
                                      	<?php if(isset($_POST['marital']) && $_POST['marital'] == "married")
											{echo 'checked="checked"';}?> />
                                      
                                      Divorced<input type="radio" name="marital" value="divorced" 
                                      	<?php if(isset($_POST['marital']) && $_POST['marital'] == "divorced")
											{echo 'checked="checked"';} ?>/>
                                      				</p>
                                                    
                    <p>Phone Number:<input type="text" name="phone" size="30" 
                    				value="<?php if(isset($_POST['phone'])) {echo $_POST['phone'];}?>" /></p>
                    
                    <p>Email Address:<input type="text" name="email" size="40" 
                    				value="<?php if(isset($_POST['email'])) {echo $_POST['email'];}?>" /></p>
                    
                    <p>Department: <select name="dept">
                    			   <option value="">Select Dept</option>
                                   <?php foreach ($department as $dept) {?>
                                   
                                   <option value="<?php echo $dept?>"
                                   <?php if(isset($_POST['dept']) && $_POST['dept'] == "$dept")
								   		{echo 'selected="selected"';}?>>
								   
								   <?php echo $dept?></option>
                                   <?php }?>
                                   </select>
                                   </p>
            		
                    <p>Designation: <input type="text" name="desig" size="40" 
                    				value="<?php if(isset($_POST['desig'])) {echo $_POST['desig'];}?>" /></p>
                    
                    <p>Salary: <input type="text" name="sala" size="40" 
                    				value="<?php if(isset($_POST['sala'])) {echo $_POST['sala'];}?>" />
                                    
                    	Commission <input type="text" name="comi" size="40" 
                        			value="<?php if(isset($_POST['comi'])) {echo $_POST['comi'];}?>" />
                        				</p>
                                        
                    <p>Staff Bank: <select name="bank">
                    			  <option value="">Select Bank</option>
                                  <?php foreach ($bank as $bank) {?>
                                  
								  <option value="<?php echo $bank?>"
                                  <?php if(isset($_POST['bank']) && $_POST['bank'] == "$bank")
								  		{echo 'selected="selected"';}?>>
                                  
								  <?php echo $bank?></option>
                                  <?php }?>
                                  </select>
                                  </p>
                                  
                    <P>Account Number: <input type="text" name="acct" size="40" 
                    				value="<?php if(isset($_POST['acct'])) {echo $_POST['acct'];}?>" /></P>
                                    
                                    
                     <p>Password: <input type="password" name="pass" size="40" /></p>
                    
                    <input type="submit" name="add" value="Click to Submit" />                   	
            
		
</fieldset>
</form>
</body>
</html>