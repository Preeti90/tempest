<?php 

require_once '../includes/DbOperationsANM.php';
$db = new DbOperationsANM(); 

// json response array
$response = array("error" => FALSE);



	
	
	$date = $db->getAllMembers();

	
	//print_r($asha);
	if ($date != false) 
	{
	//print_r($asha);
		$response["error"] = FALSE;
	$response["message"] = $date;
    	echo json_encode($response);
        	
     }else{
			// user is not found with the credentials
        $response["error"] = TRUE;
        $response["message"] = "Failed";
        echo json_encode($response);		
		}


