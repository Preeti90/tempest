<?php 

require_once '../includes/DbOperationsRegisteredFamily.php';
$db = new DbOperationsRegisteredFamily(); 

// json response array
$response = array("error" => FALSE);

if (
	isset($_POST['familyid']) 
	)
{	
	
	$familyid = $_POST['familyid'];
	

	$date = $db->getHeadbyId($familyid);
	//print_r($asha);
	if ($date != false) 
	{	
		$response["error"] = FALSE;
		$response["message"] = $date;
    	echo json_encode($response);
        	
        	
    }
	else {
    	 $response["error"] = TRUE;
        $response["message"] = "No such familyid";
        echo json_encode($response);
		}
	
}else{
		// required post params is missing
	    $response["error"] = TRUE;
	    $response["message"] = "Required parameters  is missing!";
	    echo json_encode($response);
		}