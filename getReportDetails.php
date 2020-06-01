<?php 

require_once '../includes/DbOperationsANM.php';
$db = new DbOperationsANM(); 

// json response array
$response = array("error" => FALSE);

if (
	isset($_POST['registerdate']) and 
	isset($_POST['membername']) and 
	isset($_POST['memberfamilyid'])
	)
{	
	
	$registerdate = $_POST['registerdate'];
	$membername = $_POST['membername'];
	$memberfamilyid = $_POST['memberfamilyid'];



	$date = $db->getReportDetails($registerdate,$membername,$memberfamilyid);
	//print_r($asha);
	if ($date != false) 
	{	
		$response["error"] = FALSE;
		$response["message"] = $date;
    	echo json_encode($response);
        	
        	
    }
	else {
    	 $response["error"] = TRUE;
        $response["message"] = "Failed";
        echo json_encode($response);
		}
	
}else{
		// required post params is missing
	    $response["error"] = TRUE;
	    $response["message"] = "Required parameters  is missing!";
	    echo json_encode($response);
		}