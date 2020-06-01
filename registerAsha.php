<?php 

require_once '../includes/DbOperations.php';
//operate the data further 

		$db = new DbOperations(); 

$response = array("error" => FALSE);


	if(
		isset($_POST['AshaUsername']) and 
		isset($_POST['ASHApwd']) and 
		isset($_POST['Ashaname']) and 
		isset($_POST['ANMname']) and 
		isset($_POST['ANMid']) and 
		isset($_POST['ASHAarea']) and 
		isset($_POST['Ashaphno'] ))
		{
		

		// receiving the post params
			$AshaUsername = $_POST['AshaUsername'];
   			$ASHApassword = $_POST['ASHApwd'];
    		$Ashaname = $_POST['Ashaname'];
    		$ANMname = $_POST['ANMname'];
    		$ANMid = $_POST['ANMid'];
    		$ASHAarea = $_POST['ASHAarea'];
    		$Ashaphno = $_POST['Ashaphno'];

    	// check if user is already existed with the same email
    	if ($db->isUserExist($Ashaphno)) {
    		// user already existed
        $response["error"] = TRUE;
        $response["message"] = "User already exists with this phonenumber" . $Ashaphno;
        echo json_encode($response);

        } else {
        // create a new user
        	$asha = $db->createUser($AshaUsername, $ASHApassword,$Ashaname,$ANMname,$ANMid,$ASHAarea,$Ashaphno);
        	if ($asha) {
            // user stored successfully
			$response['error'] = false; 
			$response['message'] = "User registered successfully";
			$response["ASHAid"] = $asha["ASHAid"];
			$response["asha"]["ASHAid"] = $asha["ASHAid"];
			$response["asha"]["AshaUsername"] = $asha["AshaUsername"];
			$response["asha"]["ASHApwd"] = $asha["ASHApwd"];
			$response["asha"]["Ashaname"] = $asha["Ashaname"];
			$response["asha"]["ANMname"] = $asha["ANMname"];
			$response["asha"]["ANMid"] = $asha["ANMid"];
			$response["asha"]["ASHAarea"] = $asha["ASHAarea"];
			$response["asha"]["Ashaphno"] = $asha["Ashaphno"];
			echo json_encode($response);

			} else {
            // user failed to store
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
         }
		} else {
    	$response["error"] = TRUE;
    	$response["message"] = "Required fields are missing!";
    	echo json_encode($response);
		}


