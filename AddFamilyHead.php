<?php 

require_once '../includes/DbOperationsAddDetails.php';
$db = new DbOperationsAddDetails(); 

// json response array
$response = array("error" => FALSE);

if ( 
	isset($_POST['familyHeadName']) and 
	isset($_POST['familyHeadphno']) and 
	isset($_POST['familyashaid']) )

	{
		// receiving the post params
			$familyHeadName = $_POST['familyHeadName'];
   			$familyHeadphno = $_POST['familyHeadphno'];
    		$familyashaid = $_POST['familyashaid'];

    		// check if user is already existed with the same email
    	if ($db->isFamilyExist($familyHeadName,$familyHeadphno,$familyashaid)) 
    	 {
    		// user already existed
        $response["error"] = TRUE;
        $response["message"] = "Family already exists. Please click Update Family button";
        echo json_encode($response);

         } else
         {
    		$family = $db->addFamilyHead($familyHeadName, $familyHeadphno,$familyashaid );
    		
        	if ($family) 
        	{
            // user stored successfully
			$response['error'] = false; 
			$response['message'] = "Family registered successfully";
			$response["familyashaid"] = $family["familyashaid"];
            $response["family"]["familyid"] = $family["familyid"];
			$response["family"]["familyHeadName"] = $family["familyHeadName"];
			$response["family"]["familyHeadphno"] = $family["familyHeadphno"];
			$response["family"]["familyashaid"] = $family["familyashaid"];
			
			echo json_encode($response);

			} 
			else 
			{
            // user failed to store
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        	}
          }
	} else
	{
    	$response["error"] = TRUE;
    	$response["message"] = "Required fields are missing!";
    	echo json_encode($response);
	}

