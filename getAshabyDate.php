<?php 

require_once '../includes/DbOperationsANM.php';
$db = new DbOperationsANM(); 

// json response array
$response = array("error" => FALSE);

if (
	isset($_POST['memberanmid']) and 
	isset($_POST['surveydate'])
	)
{
	$memberanmid = $_POST['memberanmid'];
	$surveydate = $_POST['surveydate'];
	$asha = $db->getAshabyDate($memberanmid,$surveydate);
	//print_r($asha);
	if ($asha != false) 
	{
		//$response["error"] = FALSE;
    	//	$response["message"] = "ashalist updated ";
    	//	echo json_encode($response);
    	$response["error"] = FALSE;
		$response["message"] = $asha;
    	
    	echo json_encode($response);
    	
        	
     }else{
			// user is not found with the credentials
        $response["error"] = TRUE;
        $response["message"] = "No Ashas registered on this date ";
        echo json_encode($response);		
		}

}else{
		// required post params is missing
	    $response["error"] = TRUE;
	    $response["message"] = "Required parameters dateselected is missing!";
	    echo json_encode($response);
		}
