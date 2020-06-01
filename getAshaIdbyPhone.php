<?php 

require_once '../includes/DbOperationsAddDetails.php';
$db = new DbOperationsAddDetails(); 

// json response array
$response = array("error" => FALSE);

if (
	isset($_POST['Ashaphno']) 
	)
{	
	$Ashaphno = $_POST['Ashaphno'];
	
	$asha = $db->getAshaIdbyPhone($Ashaphno);
	//print_r($asha);
	if ($asha) 
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
        $response["message"] = "No Ashaphno found";
        echo json_encode($response);		
		}

}else{
		// required post params is missing
	    $response["error"] = TRUE;
	    $response["message"] = "Required parameters dateselected is missing!";
	    echo json_encode($response);
		}
