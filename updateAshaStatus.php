<?php 

require_once '../includes/DbOperationsRegisteredFamily.php';
//operate the data further 

		$db = new DbOperationsRegisteredFamily(); 

$response = array("error" => FALSE);

if(
		isset($_POST['memberashaid']) and 
		isset($_POST['surveydate']) 
	)
	{

		// receiving the post params
			$memberashaid = $_POST['memberashaid'];
   			$surveydate = $_POST['surveydate'];

   			if($db->updateAshaStatus($memberashaid, $surveydate ))
   			{
    		$response["error"] = FALSE;
    		$response["message"] = "Asha Status  updated ";
    		echo json_encode($response);
    		} else {
    		$response["error"] = TRUE;
    		$response["message"] = "Unknown Error occured ";
    		echo json_encode($response);	
    		}

    }
else {
    	$response["error"] = TRUE;
    	$response["message"] = "Required inputs missing ";
    	echo json_encode($response);
	}
