<?php 

require_once '../includes/DbOperationsRegisteredFamily.php';
//operate the data further 

		$db = new DbOperationsRegisteredFamily(); 

$response = array("error" => FALSE);

if(
		isset($_POST['memberid']) and 
		isset($_POST['memberfamilyid']) and 
        isset($_POST['membername']) and 
        isset($_POST['score']) and
        isset($_POST['surveydate']) and 
        isset($_POST['memberashaid']) 
	)
	{
		

		// receiving the post params
			$memberid = $_POST['memberid'];
   			$memberfamilyid = $_POST['memberfamilyid'];
            $membername = $_POST['membername'];
            $score = $_POST['score'];
            $surveydate = $_POST['surveydate'];
            $memberashaid = $_POST['memberashaid'];
    		

    		$date = $db->createScore($memberid, $memberfamilyid,$membername,$score,$surveydate,$memberashaid );
            
    		$response["error"] = FALSE;
    		$response["message"] = "score updated ";
    		echo json_encode($response);
        	
         }
		 else {
    	$response["error"] = TRUE;
    	$response["message"] = "Required inputs missing ";
    	echo json_encode($response);
		}


