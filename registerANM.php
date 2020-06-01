<?php 

require_once '../includes/DbOperationsANM.php';
//operate the data further 

		$db = new DbOperationsANM(); 

$response = array("error" => FALSE);
print_r($_POST);

	if(
		isset($_POST['ANMUsername']) and 
		isset($_POST['ANMpassword']) and 
		isset($_POST['ANMphno']) and 
		isset($_POST['ANMname']) and 
		isset($_POST['ANMdistrict']) and 
		isset($_POST['ANMSubCentre']) and 
		isset($_POST['ANMvillages']) 
		)
		

		{
		

		// receiving the post params
			$ANMUsername = $_POST['ANMUsername'];
   			$ANMpassword = $_POST['ANMpassword'];
    		$ANMphno = $_POST['ANMphno'];
    		$ANMdistrict = $_POST['ANMdistrict'];
    		$ANMname = $_POST['ANMname'];
    		$ANMSubCentre = $_POST['ANMSubCentre'];
    		$ANMvillages = $_POST['ANMvillages'];
    		

    	// check if user is already existed with the same email
    		if ($db->isANMExist($ANMphno)) 
    		{
    		// user already existed
	        $response["error"] = TRUE;
	        $response["message"] = "ANM already exists with this phonenumber" . $ANMphno;
	        echo json_encode($response);

	        } else
	        {
        // create a new user
        	$anm = $db->registerANM($ANMUsername, $ANMphno,$ANMname, $ANMpassword,$ANMdistrict,$ANMSubCentre,$ANMvillages);
        	if ($anm) 
        	{
            // user stored successfully
			$response['error'] = false; 
			$response['message'] = $anm;
			echo json_encode($response);

			} else 
			{
            // user failed to store
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        	}
         }
     }

	 else 
	 {
    	$response["error"] = TRUE;
    	$response["message"] = "Required fields are missing!";
    	echo json_encode($response);
	}






?>

