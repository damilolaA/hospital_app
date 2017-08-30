<?php

	function viewPatients ($dummy){
		
	$result = "";
	
		while ($select = mysqli_fetch_array($dummy)){
			
			$result .= '<tr><td>'.$select['firstname'].'</td>';
            $result .= '<td>'.$select['lastname'].'</td>';
            $result .= '<td>'.$select['gender'].'</td>';
			$result .= '<td>'.$select['marital_status'].'</td>';
			$result .= '<td>'.$select['dob'].'</td>';
			$result .= '<td>'.$select['phone'].'</td>';
			$result .= '<td>'.$select['address'].'</td>';
			$result .= '<td>'.$select['blood_group'].'</td>';
			$result .= '<td>'.$select['blood_type'].'</td>';
			$result .= '<td>'.$select['health_issues'].'</td>';
			$result .= '<td>'.$select['insurance'].'</td></tr>';
			
					
			}	
		return $result;
	}

 
 	function viewStaff($dum) {
		
		$result = "";
		
		while($select = mysqli_fetch_array($dum)){
			
			$result .= '<tr><td>'.$select['firstname'].' '.$select['lastname'].'</td>';
            $result .= '<td>'.$select['gender'].'</td>';
            $result .= '<td>'.$select['dob'].'</td>';
            $result .= '<td>'.$select['marital'].'</td>';
            $result .= '<td>'.$select['phone'].'</td>';
            $result .= '<td>'.$select['department'].'</td>';
            $result .= '<td>'.$select['designation'].'</td>';
            $result .= '<td>'.$select['salary'].'</td>';
            $result .= '<td>'.$select['bank'].'</td>';
            $result .= '<td>'.$select['account_number'].'</td>';
						
			}
			/*	var_dump($result);exit();  */
				return $result;	
			}
 
 
?>