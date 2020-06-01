<?php 


require_once '../includes/DbOperationsAddDetails.php';
$db = new DbOperationsAddDetails(); 

// json response array
$response = array("error" => FALSE);
				

if ( 
	isset($_POST['membername']) and 
	isset($_POST['membergender']) and 
	isset($_POST['memberage']) and
	 

	isset($_POST['memberfamilyId']) and
	isset($_POST['memberheadname']) and 
	isset($_POST['memberashaid']) and
	isset($_POST['memberashaname']) and
	isset($_POST['score']) and 
	isset($_POST['registerdate']) and 
	isset($_POST['surveydate']) and 
  isset($_POST['memberanmid']) and 
  isset($_POST['longitude']) and 
  isset($_POST['latitude']) and 
  
  
	isset($_POST['memberstatus']) and
	isset($_POST['memberashastatus']) 
   )

	{
		// receiving the post params
			$membername = $_POST['membername'];
   			$membergender = $_POST['membergender'];
    		$memberage = $_POST['memberage'];

    		
   			$memberfamilyId = $_POST['memberfamilyId'];
   			$memberheadname = $_POST['memberheadname'];

    		$memberashaid = $_POST['memberashaid'];
    		$memberashaname = $_POST['memberashaname'];

        $memberanmid = $_POST['memberanmid'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];

    		$score = $_POST['score'];
   			$registerdate = $_POST['registerdate'];
    		$surveydate = $_POST['surveydate'];

    		$memberstatus = $_POST['memberstatus'];

			$memberashastatus = $_POST['memberashastatus'];


    		
    	
    		$member = $db->addMember($membername,$membergender,
                                          $memberage, $memberfamilyId,$memberheadname,
                                          $memberashaid ,$memberanmid,$memberashaname,$score, $registerdate,$surveydate,$memberstatus,$memberashastatus,$latitude,$longitude);

    		

    		
        	if ($member) 
        	{
            // user stored successfully
			$response["error"] = FALSE;
			$response["message"] = $member;
    	
    		echo json_encode($response);
			
			
			//echo json_encode($response);

			} 
			else 
			{
            // user failed to store
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        	}
          }
	else
	{
    	$response["error"] = TRUE;
    	$response["message"] = "Required fields are missing!";
    	echo json_encode($response);
	}




