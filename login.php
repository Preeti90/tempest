<?php 

require_once '../includes/DbOperations.php';
$db = new DbOperations(); 

// json response array
$response = array("error" => FALSE);

if ( isset($_POST['Usertype']) and
	isset($_POST['Username']) and isset($_POST['Pwd']))
{
		

			// receiving the post params
			$Usertype = $_POST['Usertype'];
			if($Usertype==="asha")
    		{
				$AshaUsername = $_POST['Username'];
	    		$ASHApwd = $_POST['Pwd'];
	    		
				$asha = $db->getAshaPhByUsername($_POST['Username']);
				if ($asha != false) 
				{
	        // use is found
		        	$response["error"] = FALSE;
		        	$response["message"] = $asha;
					echo json_encode($response);
				
				}
				else{
				// user is not found with the credentials
			        $response["error"] = TRUE;
			        $response["message"] = "Invalid Phone number or password";
			        echo json_encode($response);		
				}
			}else if($Usertype==="anm")
			{
				$AnmUsername = $_POST['Username'];
	    		$Anmpwd = $_POST['Pwd'];
	    		
				$anm = $db->getAnmPhByUsername($_POST['Username']);
				if ($anm != false) 
				{
	        // use is found
		        	$response["error"] = FALSE;
		        	$response["message"] = $anm;
					
					echo json_encode($response);
				

				}
				else{
				// user is not found with the credentials
			        $response["error"] = TRUE;
			        $response["message"] = "Invalid Phone number or password";
			        echo json_encode($response);		
				}
			}
			

	}else{
		// required post params is missing
	    $response["error"] = TRUE;
	    $response["message"] = "Required parameters Phone number or password is missing!";
	    echo json_encode($response);
		}

?>
