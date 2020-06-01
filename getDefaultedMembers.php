<?php 

require_once '../includes/DbOperationsANM.php';
$db = new DbOperationsANM(); 

// json response array
$response = array("error" => FALSE);

if (
	isset($_POST['surveydate']) and 
	isset($_POST['memberashaid'])
	)
{	
	$memberashaid = $_POST['memberashaid'];
	$surveydate = $_POST['surveydate'];
	$member = $db->getDefaultedMembers($memberashaid, $surveydate);
	//print_r($asha);
	if ($member != false) 
	{
		//$response["error"] = FALSE;
    	//	$response["message"] = "ashalist updated ";
    	//	echo json_encode($response);
    	$response["error"] = FALSE;
		$response["message"] = $member;
    	
    	echo json_encode($response);
        	
     }else{
			// user is not found with the credentials
        $response["error"] = TRUE;
        $response["message"] = "No Members Pending";
        echo json_encode($response);		
		}

}else{
		// required post params is missing
	    $response["error"] = TRUE;
	    $response["message"] = "Required parameters dateselected is missing!";
	    echo json_encode($response);
		}
