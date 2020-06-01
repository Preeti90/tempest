<?php 

require_once '../includes/DbOperationsRegisteredFamily.php';
//operate the data further 

		$db = new DbOperationsRegisteredFamily(); 

$response = array("error" => FALSE);

if(
		isset($_POST['memberfamilyid']) and 
		isset($_POST['surveydate']) 
	)
	{
		

		// receiving the post params
			$memberfamilyid = $_POST['memberfamilyid'];
   			$surveydate = $_POST['surveydate'];
    		

    		$date = $db->fillSurveyDate($memberfamilyid, $surveydate );
    		$response["error"] = FALSE;
    		$response["message"] = "Surveydate updated ";
    		echo json_encode($response);
        	
         }
		 else {
    	$response["error"] = TRUE;
    	$response["message"] = "Required inputs missing ";
    	echo json_encode($response);
		}


