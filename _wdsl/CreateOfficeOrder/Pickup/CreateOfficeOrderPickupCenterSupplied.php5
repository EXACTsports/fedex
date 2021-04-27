<?php
$newLine = "<br />";
//
// Example of how to create an office order for pickup based on a center id that is supplied in the request
//
echo 'Example of how to create an office order for pickup based on a center id that is supplied in the request', $newLine, $newLine;


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


//
// Assign required data for request object
//
$fileToken = "your file token";
$uploadSessionId = "your upload session id";

$key = "your key"; 
$password = "your password";
$clientProductId = "your client product id";
$clientProductVers = "your client product version";
$integratorId = "your integrator id";

$serviceId = "oord"; //as is
$major = "2"; //as is
$intermediate = "1"; //as is
$minor = "0"; //as is
$customerTxnId = "Create Office Order v1 using PHP with pickup center supplied";

$contactFirstName = "contact first name";
$contactLastName = "contact last name";
$contactCompanyName = "contact company name";
$contactPhoneNumber = "contact phone number"; //10 digits
$contactFaxNumber = "contact fax number"; //10 digits
$contactEmailAddress = "contact email address";
$contactStreetLines = "contact street address";
$contactCity = "contact city";
$contactStateOrProvinceCode = "contact state";
$contactPostalCode = "contact postal code";
$contactCountryCode = "contact country code"; //for example, US
$contactResidential = "false";

$deliveryGroupsName = "delivery group name";
$deliveryGroupsDescription = "delivery group description";
$deliveryType = "PICKUP"; //as is
$recFirstName = "recipient first name";
$recLastName = "recipient last name";
$recCompanyName = "recipient company name";
$recPhoneNumber = "recipient phone number"; //10 digits
$recFaxNumber = "recipient fax number"; //10 digits
$recEmailAddress = "recipient email address";

$centerId = "known center id"; //for example, 0512

$officeOrderPaymentType = "ACCOUNT"; //as is
$officeOrderAcctType = "FEDEX_OFFICE"; //as is
$officeOrderAcctNumber = "your fedex office account number";

$numberOfCopies = "number of copies"; //for example, 2
$docName = "My document";
$printType = "print type"; //for example, BLACK_AND_WHITE
$numberOfSides = "number of sides"; //for example, SINGLE
$mediaCategory = "media category"; //for example, STANDARD
$mediaDescription = "media description"; //for example, RECYCLED_30_PERCENT

$orderConfirmationEmailRequestedFlag = "true";
$orderCompletionEmailRequestedFlag = "true";
$orderNotificationCCEmailAddresses = "cc email address for order notification";
$orderNotificationBCCEmailAddresses = "bcc email address for order notification";
$customerReferenceType = "P_O_NUMBER"; //as is
$customerReferenceValue = "customer reference"; //for example, 12345


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
$request['RequestedOfficeOrder'] = array(
				   'OrderContact' => array(
				   		'Contact' => array(
								'PersonName' => array('FirstName' => $contactFirstName, 'LastName' => $contactLastName),
								'CompanyName' => $contactCompanyName,
								'PhoneNumber' => $contactPhoneNumber,
								'FaxNumber' => $contactFaxNumber,
								'EMailAddress' => $contactEmailAddress),
				   		'Address' => array(
				   			      'StreetLines' => $contactStreetLines,
				   		      	      'City' => $contactCity,
				   		      	      'StateOrProvinceCode' => $contactStateOrProvinceCode,
				   		              'PostalCode' => $contactPostalCode,
				   		              'CountryCode' => $contactCountryCode,				   		              
				   		              'Residential' => $contactResidential)),					   		              				   		              
				    'DeliveryGroups' => array(
				    	 	      'Name' => $deliveryGroupsName, 
				   		      'Description' => $deliveryGroupsDescription,
				   		      'DeliveryMethod' => array(
				   				'DeliveryType' => $deliveryType,
				   				'OrderRecipient' => array(
				   					'Contact' => array(
				   						      'PersonName' => array('FirstName' => $recFirstName, 'LastName' => $recLastName),
				   			      			      'CompanyName' => $recCompanyName,
				   			      			      'PhoneNumber' => $recPhoneNumber,
				   			      			      'FaxNumber' => $recFaxNumber,
				   			      			      'EMailAddress' => $recEmailAddress)),
				   			      	'CenterId' => $centerId),
				   		       'PrintLineItems' => array(0 => 	array(	'NumberOfCopies' => $numberOfCopies,
				   					               		'Document' => array(
				   					                	'Name' => $docName,
				   					                	'Sections' => array(0 => array('UploadSessionId' => $uploadSessionId,
				   					      			      			       'FileToken' => $fileToken,
				   					      			      			       'PrintType' => $printType,
				   					      			      			       'NumberOfSides' => $numberOfSides,
				   					      			      			       'SectionMediaDetail' => array(
				   					      		      					      'MediaCategory' => $mediaCategory,
				   				      		      		      			              'MediaDescription' => $mediaDescription))))))),
				   'OfficeOrderChargesPayment' =>  array(
					   	'PaymentType' => $officeOrderPaymentType,
					   	'Payor' => array(
					   		      'AssociatedAccounts' => array(
					   		      'Type' => $officeOrderAcctType,
					   		      'AccountNumber' => $officeOrderAcctNumber))),
					   		      
				   'OrderConfirmationEmailRequested' => $orderConfirmationEmailRequestedFlag,
				   'OrderCompletionEmailRequested' => $orderCompletionEmailRequestedFlag,
				   'OrderNotificationCCEmailAddresses' => $orderNotificationCCEmailAddresses,
				   'OrderNotificationBCCEmailAddresses' => $orderNotificationBCCEmailAddresses,
				   'CustomerReferences' => array('CustomerReferenceType' => $customerReferenceType, 'Value' => $customerReferenceValue));
			   							     									
try 
{

	//
	// Create an office order for pickup based on a center id that is supplied in the request
	//
    	echo $newLine, 'Creating an office order for pickup based on a center id that is supplied in the request...', $newLine, $newLine;
    	$response = $client->createOfficeOrder($request);  // FedEx web service invocation

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