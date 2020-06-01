<?php 

require_once '../includes/DbOperationsRegisteredFamily.php';
$db = new DbOperationsRegisteredFamily(); 

// json response array
$response = array("error" => FALSE);

if (
	isset($_POST['memberanmid']) and 
	isset($_POST['memberashaid']) and 
	isset($_POST)['memberfamilyId'])
	)
{
	$memberanmid = $_POST['memberanmid'];
	$memberashaid = $_POST['memberashaid'];
	$memberfamilyId = $_POST['memberfamilyId'];
	$lat = $db->getLatitude($memberanmid,$memberashaid,$memberfamilyId);
	//print_r($asha);
	if ($lat != false) 
	{
		//$response["error"] = FALSE;
    	//	$response["message"] = "ashalist updated ";
    	//	echo json_encode($response);
    	$response["error"] = FALSE;
		$response["message"] = $lat;
    	
    	echo json_encode($response);
    	
        	
     }else{
			// user is not found with the credentials
        $response["error"] = TRUE;
        $response["message"] = "Couldnt get the latitude ";
        echo json_encode($response);		
		}

}else{
		// required post params is missing
	    $response["error"] = TRUE;
	    $response["message"] = "Required parameters dateselected is missing!";
	    echo json_encode($response);
		}
