<?php
$newLine = "<br />";
//
// Example of how to rate an office order for pickup with a center id that will be selected based on provided search criteria
//
echo 'Example of how to rate an office order for pickup with a center id that will be selected based on provided search criteria', $newLine, $newLine;


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
$customerTxnId = "Rate Office Order v1 using PHP with pickup center search";

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
$contactCountryCode = "contact country code"; //e.g., US
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

$centerStreetLines = "center street address";
$centerCity = "center city";
$centerStateOrProvinceCode = "center state";
$centerPostalCode = "center postal code";
$centerCountryCode = "center country code"; //e.g., US
$centerDueDateTime = "YYYY-MM-DDTHH"; //e.g., 2009-05-28T21

$officeOrderPaymentType = "ACCOUNT"; //as is
$officeOrderAcctType = "FEDEX_OFFICE"; //as is
$officeOrderAcctNumber = "your fedex office account number";

$numberOfCopies = "number of copies"; //e.g., 2
$docName = "My Document";
$printType = "print type"; //e.g., BLACK_AND_WHITE
$numberOfSides = "number of sides"; //e.g., SINGLE
$mediaCategory = "media category"; //e.g., STANDARD
$mediaDescription = "media description"; //e.g., RECYCLED_30_PERCENT

$orderConfirmationEmailRequestedFlag = "true";
$orderCompletionEmailRequestedFlag = "true";
$orderNotificationCCEmailAddresses = "cc email address for order notification";
$orderNotificationBCCEmailAddresses = "bcc email address for order notification";
$customerReferenceType = "P_O_NUMBER"; //as is
$customerReferenceValue = "customer reference"; //e.g., 12345


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
				   			      	'OrderPickupDetail' => array (
				   			      		'LocationSearchCriteria' => array(
				   			      			'StreetLines' => $centerStreetLines,
				   			      			'City' => $centerCity,
				   			      			'StateOrProvinceCode' => $centerStateOrProvinceCode,
				   			      			'PostalCode' => $centerPostalCode,
				   			      			'CountryCode' => $centerCountryCode,
				   			      			'Residential' => false),
				   			      		'DueDateTime' => $centerDueDateTime)),					   			      	
				   			'PrintLineItems' => array(
				   					'NumberOfCopies' => $numberOfCopies,
				   					'Document' => array(
				   						'Name' => $docName,
				   					      	'Sections' => array(
				   					      		      'UploadSessionId' => $uploadSessionId,
				   					      		      'FileToken' => $fileToken,
				   					      		      'PrintType' => $printType,
				   					      		      'NumberOfSides' => $numberOfSides,
				   					      		      'SectionMediaDetail' => array(
				   					      		      		      'MediaCategory' => $mediaCategory,
				   				      		      		              'MediaDescription' => $mediaDescription))))),				   
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
	// Rate an office order for pickup with a center id that will be selected based on provided search criteria
	//
    	echo $newLine, 'Rating an office order for pickup with a center id that will be selected based on provided search criteria...', $newLine, $newLine;
    	$response = $client->rateOfficeOrder($request);  // FedEx web service invocation

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