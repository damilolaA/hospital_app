<?php
		session_start();
		
		include("db/db_config.php");
		
		$admin_id = $_SESSION['id'];
		$admin_name = $_SESSION['user'];





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Patients</title>
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
				echo '<p><strong>Admin Name:'.' '.$admin_name.'</strong></p>';
		
		?>
        			<div>
       		<a href="admin_home.php">Home</a>
            <a href="add_staff.php">Add Staff</a>
            <a href="view_staff.php">View Staff</a>
            <a href="add_patients.php">Add Patients</a>
            <a href="view_patients.php">View Patients</a>
            <a href="admin_logout.php">Logout</a>
						
                        </div>
                        
                        
              <?php          
                   
				  	if(array_key_exists('register', $_POST)) {
						
						$error = array();
						
					if(empty($_POST['fname'])) {
						$error[] = 'Please fill in firstname';
						}else {
							$fname = mysqli_real_escape_string($db, $_POST['fname']);
							}
						
					if(empty($_POST['lname'])) {
						$error[] = 'Please fill in lastname';
						}else {
							$lname = mysqli_real_escape_string($db, $_POST['lname']);
							}
							
					if(empty($_POST['sex']))  {
						$error[] = 'Select gender';
						}else {
							$sex = mysqli_real_escape_string($db, $_POST['sex']);
							}
							
					if(empty($_POST['marital'])) {
						$error[] = 'Choose marital status';
						}else {
							$marital = mysqli_real_escape_string($db, $_POST['marital']);
							}
							
					if(empty($_POST['day']))  {
						$error[] = 'Select day of birth';
						}else {
							$dy = mysqli_real_escape_string($db, $_POST['day']);
							}
							
					if(empty($_POST['month'])) {
						$error[] = 'Select month of birth';
						}else {
							$mon = mysqli_real_escape_string($db, $_POST['month']);
							}
							
					if(empty($_POST['year'])) {
						$error[] = 'Select year of birth';
						}else {
							$yr = mysqli_real_escape_string($db, $_POST['year']);
							}
							
					if(empty($_POST['phone']))  {
						$error[] = 'Fill in telephone number';
						}else {
							$phone = mysqli_real_escape_string($db, $_POST['phone']);
							}
							
					if(empty($_POST['add']))  {
						$error[] = 'Fill in address';
						}else {
							$add = mysqli_real_escape_string($db, $_POST['add']);
							}
							
					if(empty($_POST['group'])) {
						$error[] = 'Select blood group';
						}else {
							$group = mysqli_real_escape_string($db, $_POST['group']);
							}
							
					if(empty($_POST['type']))  {
						$error[] = 'Select blood type';
						}else {
							$type = mysqli_real_escape_string($db, $_POST['type']);
							}
							
					if(empty($_POST['health'])) {
						$error[] = 'Select previous health challenges';
						}else {
							$health = mysqli_real_escape_string($db, $_POST['health']);
							}
							
			/*		if(empty($_POST['ins']))  {
						$error[] = 'Select health insurance';
						}else {
							$ins = mysqli_real_escape_string($db, $_POST['ins']);
							}	*/
							
					if(empty($_POST['l_app'])) {
						$error[] = 'Input last appointment date';
						}else {
							$lapp = mysqli_real_escape_string($db, $_POST['l_app']);
							}
							
					if(empty($_POST['n_app'])) {
						$error[] = 'Input next appointment date';
						}else {
							$napp = mysqli_real_escape_string($db, $_POST['n_app']);
							}
							
					if(empty($_POST['nok'])) {
						$error[] = 'Fill in next of kin';
						}else {
							$nok = mysqli_real_escape_string($db, $_POST['nok']);
							}
							
					if(empty($_POST['rnok']))  {
						$error[] = 'Fill in relationship with next of kin';
						}else {
							$rnok = mysqli_real_escape_string($db, $_POST['rnok']);
							}
							
					if(empty($_POST['tnok']))  {
						$error[] = 'Fill in telephone of next of kin';
						}else {
							$tnok = mysqli_real_escape_string($db, $_POST['tnok']);
							}
							
					if(empty($_POST['pass'])) {
						$error[] = 'Input passwor';
						}else {
							$pass = md5(mysqli_real_escape_string($db, $_POST['pass']));
							}
							
					if(empty($error))	 {
						
						
						$query = mysqli_query($db, "INSERT INTO patient
															VALUES(NULL,
																	'".$fname."',
																	'".$lname."',
																	'".$sex."',
																	'".$marital."',
																	'".$yr.'-'.$mon.'-'.$dy."',
																	'".$phone."',
																	'".$add."',
																	'".$group."',
																	'".$type."',
																	'".$health."',
																	'".rand(10000, 99999)."',
																	'".$lapp."',
																	'".$napp."',
																	'".$nok."',
																	'".$rnok."',
																	'".$tnok."',
																	'".$pass."',
																	'".$admin_id."')
																	") or die(mysqli_error($db));
																	
					$success = "Patient Sucessfully Added";
					
					header("Location: add_patients.php?success=$success");
					
						}else {
							
							foreach($error as $error){
								echo '<p>'.$error.'</p>';}
							
							}
											
						}
				   
				   	if(isset($_GET['success'])) {
						
						echo '<p>'.$_GET['success'].'</p>';
						
						}
				   
				?>	        
                        
            <fieldset><legend>Fill in Patients Form</legend>
            
            <form action="" method="post">
            
            <p>First Name: <input type="text" name="fname" size="40" 
            				value="<?php if(isset($_POST['fname'])) {echo $_POST['fname'];}?>" /></p>
            
            <p>Last Name: <input type="text" name="lname" size="40"
            				value="<?php if(isset($_POST['lname'])) {echo $_POST['lname'];}?>"  /></p>
            
            <p>Gender: Male<input type="radio" name="sex" value="male"
            				<?php if(isset($_POST['sex']) && $_POST['sex'] == "male")
								{echo 'checked="checked"';} ?> />
                                
            		   Female<input type="radio" name="sex" value="female"
                       		<?php if(isset($_POST['sex']) && $_POST['sex'] == "female")
								{echo 'checked="checked"';}?> /></p>
                       
             <P>Marital Status: Single<input type="radio" name="marital" value="single"
             				<?php if(isset($_POST['marital']) && $_POST['marital'] == "single")
								{echo 'checked="checked"';}?> />
             
             				    Married<input type="radio" name="marital" value="married" 
                              <?php if(isset($_POST['marital']) && $_POST['marital'] == "married")
							  		{echo 'checked="checked"';}?> />
                                
                                Divorced<input type="radio" name="marital" value="divorced" 
                               <?php if(isset($_POST['marital']) && $_POST['marital'] == "marital")
							   		{echo 'checked="checked"';}?> />
                                		</P>
                                        
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
                               <?php for ($mon=1; $mon<=12; $mon++) {?>
                               
                               <option value="<?php echo $mon?>"
                               <?php if(isset($_POST['month']) && $_POST['month'] == "$mon")
							   		{echo 'selected = "selected"';}?>>
							   
							   <?php echo $mon?></option>
                               <?php } ?>
                               </select>
                               
                               <select name="year">
                               <option value="">Select Year</option>
                               <?php for ($yr=1990; $yr<=2017; $yr++) {?>
                               
                               <option value="<?php echo $yr?>"
                               <?php if(isset($_POST['year']) && $_POST['month'] == "year")
							   		{echo 'selected = "selected"';}?>>
							   
							   <?php echo $yr?></option>
                               <?php }?>
                               </select>
                               </p>
                               
                <p>Phone Number: <input type="text" name="phone" size="40" 
                			value="<?php if (isset($_POST['phone'])) {echo $_POST['phone'];}?>" /></p>
                
                <p>Address: <textarea name="add" cols="15" rows="5">
                			<?php if(isset($_POST['add'])) {echo $_POST['add'];}?>	
                </textarea></p>
                
                <p>Blood Group: A<input type="radio" name="group" value="a"
                				<?php if(isset($_POST['group']) && $_POST['group'] == "a")
									{echo 'checked = "checked"';}?> />
                
                				B<input type="radio" name="group" value="b" 	
                                <?php if(isset($_POST['group']) && $_POST['group'] == "b")
									{echo 'checked = "checked"';}?> />
                                
                                AB<input type="radio" name="group" value="ab" 
                                <?php if(isset($_POST['group']) && $_POST['group'] == "ab")
									{echo 'checked = "checked"';}?>/>
                                
                                O<input type="radio" name="group" value="o"
                                <?php if(isset($_POST['group']) && $_POST['group'] == "0")
									{echo 'checked = "checked"';}?> />
                                </p>
                                
                 <p>Blood Type: AA<input type="radio" name="type" value="aa"
                 				<?php if(isset($_POST['type']) && $_POST['type'] == "aa")
									{echo 'checked = "checked"';}?> />
                 
                 				AS<input type="radio" name="type" value="as" 
                                <?php if(isset($_POST['type']) && $_POST['type'] == "as")
									{echo 'checked = "checked"';}?>/>
                                
                                SS<input type="radio" name="type" value="ss"
                                <?php if(isset($_POST['type']) && $_POST['type'] == "ss")
									{echo 'checked = "checked"';}?> />
                                
                                AC<input type="radio" name="type" value="ac"
                                <?php if(isset($_POST['type']) && $_post['type'] == "ac")
									{echo 'checked = "checked"';}?> />
                                		</p>
                                        
      <p>Previous Health Challenges:Malaria<input type="checkbox" name="health" value="malaria"
      							<?php if(isset($_POST['health']) && $_POST['health'] == "malaria")
									{echo 'checked = "checked"';}?> />
      
                 					Typhoid Fever<input type="checkbox" name="health" value="typhoid"
                                 <?php if(isset($_POST['health']) &&  $_POST['health'] == "typhoid")
								 	{echo 'checked = "checked"';}?> />
                                    
                                    Diabetes<input type="checkbox" name="health" value="diabetes"
                                   <?php if(isset($_POST['health']) && $_POST['health'] == "diabetes")
								   	{echo 'checked = "checked"';}?> />
                                    
                                    Hypertension<input type="checkbox" name="health" value="hypertension"
                                    <?php if(isset($_POST['health']) && $_POST['health'] == 'hypertension')
									{echo 'checked = "checked"';}?> />
                                    
                                    Migrain<input type="checkbox" name="health" value="migrain"
                                    <?php if(isset($_POST['health']) && $_POST['health'] == "migrain")
										{echo 'checked = "checked"';}?> />
                                    
                                    Heart Disease<input type="checkbox" name="health" value="heart"
                                    <?php if(isset($_POST['health']) && $_POST['health'] == "heart")
										{echo 'checked = "checked"';}?> />
                                    
                                    Mental Disease<input type="checkbox" name="health" value="mental"
                                    <?php if(isset($_POST['mental']) && $_POST['health'] == "mental") 
										{echo 'checked = "checked"';}?> />
                                    		</p>
                                            
         <!--  <p>Health Insurance:<input type="text" name="ins" size="40" 
           						value="<?php if(isset($_POST['ins']))  {echo $_POST['ins'];}?>" />
                                			</p> -->
                                           
            <p>Last Appointment: <input type="text"; name="l_app" size="40" 
            					value="<?php if(isset($_POST['l_app'])) {echo $_POST['l_app'];}?>" />
            
            	Next Appointment: <input type="text" name="n_app" size="40" 
                				value="<?php if(isset($_POST['n_app']))  {echo $_POST['n_app'];}?>" />
                						</p>
                                        
             <p>Next of Kin: <input type="text" name="nok" size="40" 
             				value="<?php if(isset($_POST['nok'])) {echo $_POST['nok'];}?>" />
             
             	Relationship with Next of Kin:<input type="text" name="rnok" size="40" 
                			value="<?php if(isset($_POST['rnok'])) {echo $_POST['rnok'];}?>" />
                
                Telephone of Next of Kin:<input type="text" name="tnok" size="40"
                			value="<?php if(isset($_POST['tnok'])) {echo $_POST['tnok'];}?>" />
                					</p>
                                    
               <P>Password:<input type="password" name="pass" size="40"
               				value="<?php if(isset($_POST['pass'])) {echo $_POST['pass'];}?>" /></P>
               
               <input type="submit" name="register" value="Click to Submit" />
            
            
</form>           
</fieldset>            
</body>
</html>