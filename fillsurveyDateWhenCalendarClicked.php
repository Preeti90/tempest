<?php 

require_once '../includes/DbOperationsANM.php';
$db = new DbOperationsANM(); 

// json response array
$response = array("error" => FALSE);

if (
	isset($_POST['surveydate']) 
	)
{	
	
	$surveydate = $_POST['surveydate'];
	$date = $db->fillsurveyDateWhenCalendarClicked($surveydate);
	//print_r($asha);
	if ($date != false) 
	{
		$response["error"] = FALSE;
    		$response["message"] = "date updated ";
    		echo json_encode($response);
        	
         }
		 else {
    	$response["error"] = TRUE;
    	$response["message"] = "Required inputs missing ";
    	echo json_encode($response);
		}
	}