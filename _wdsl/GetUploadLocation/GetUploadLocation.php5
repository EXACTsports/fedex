<?php
$newLine = "<br />";
echo 'Start of script...', $newLine, $newLine;

$curDir = getcwd();
echo 'Current directory = ', $curDir, $newLine;

require_once('library/fedex-common.php5');

//
// Assign WSDL path
//
$pathToWsdl = "./OfficeOrderService_v1.wsdl";
echo 'Path to wsdl = ', $pathToWsdl, $newLine;

ini_set("soap.wsdl_cache_enabled", "0");

//
// Assign required environment level
//
$testEnv = "https://wsbeta.fedex.com:443/web-services/office";

//
// Attempt to create a SoapClient object
//
echo 'Creating a SoapClient() object...', $newLine;
$client = new SoapClient($pathToWsdl, array('location' => $testEnv,'trace' => true, 'exceptions' => true));
echo 'Was able to create a SoapClient() object.', $newLine;


//
// Assign required data for request object
//
$key = "your key"; 
$password = "your password";
$clientProductId = "your client product id";
$clientProductVers = "your client product version";
$integratorId = "your integrator id";

$serviceId = "oord"; //as is
$major = "2"; //as is
$intermediate = "1"; //as is
$minor = "0"; //as is
$customerTxnId = "Get Upload Location Office Order v1 using PHP";


//
// Create a request object
//
echo 'Creating a request object...', $newLine;
$request['WebAuthenticationDetail'] = array('UserCredential' =>
                                      array('Key' => $key, 'Password' => $password));  
$request['ClientDetail'] = array('ClientProductId' => $clientProductId, 
					'ClientProductVersion' => $clientProductVers,
					'IntegratorId' => $integratorId);
$request['TransactionDetail'] = array('CustomerTransactionId' => $customerTxnId);
$request['Version'] = array('ServiceId' => $serviceId, 
				'Major' => $major, 
				'Intermediate' => $intermediate, 
				'Minor' => $minor);

try 
{
	//
	// Invoke SoapClient for getUploadLocation
	//
    	echo $newLine, 'Invoking SoapClient for getUploadLocation...', $newLine, $newLine;
    	$response = $client->getUploadLocation($request);  // FedEx web service invocation

    	if ($response->HighestSeverity != 'FAILURE' && $response->HighestSeverity != 'ERROR')
    	{
		echo 'Success', $newLine;   	
        	printRequestResponse($client);        
    	}
    	else
    	{
		echo 'Error in processing transaction.'. $newLine. $newLine; 
		foreach ($response-> Notifications as $notification)
		{
		    if(is_array($response -> Notifications))
		    {              
		       echo $notification -> Severity;
		       echo ': ';           
		       echo $notification -> Message . $newLine;
		    }
		    else
		    {
			echo $notification . $newLine;
		    }
		}
    	}

    	writeToLog($client);    // Write to log file
    
} catch (SoapFault $exception) {
    printFault($exception, $client);
}

echo $newLine, 'End of script.', $newLine;
?>