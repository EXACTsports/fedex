<?php
// Copyright 2009, FedEx Corporation. All rights reserved.
// Version 4.0.0

require_once('D:\htdocs\PHP\VacsService\fedex-common.php5');

//The WSDL is not included with the sample code.
//Please include and reference in $path_to_wsdl variable.
$path_to_wsdl = "D:\WSDL_2020\ValidationAvailabilityAndCommitmentService_v15.wsdl";

ini_set("soap.wsdl_cache_enabled", "0");

$client = new SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information

$request['WebAuthenticationDetail'] = array(
	'ParentCredential' => array(
		'Key' => getProperty('parentkey'), 
		'Password' => getProperty('parentpassword')
	),
	'UserCredential' => array(
		'Key' => getProperty('key'), 
		'Password' => getProperty('password')
	)
);

$request['ClientDetail'] = array(
	'AccountNumber' => getProperty('shipaccount'), 
	'MeterNumber' => getProperty('meter')
);
$request['TransactionDetail'] = array('CustomerTransactionId' => ' *** getAllServicesAndPackaging Request v5.1 using PHP ***');
$request['Version'] = array(
	'ServiceId' => 'vacs', 
	'Major' => '15',
	'Intermediate' => '0', 
	'Minor' => '0'
);
$request['Origin'] = array(
	'PostalCode' => '77510', // Origin details
    'CountryCode' => 'US'
);
$request['Destination'] = array(
	'PostalCode' => '38017', // Destination details
 	'CountryCode' => 'US'
 );
$request['ShipDate'] = getProperty('serviceshipdate');
$request['CarrierCodes'] = 'FDXE'; // valid codes FDXE-Express, FDXG-Ground, FDXC-Cargo, FXCC-Custom Critical and FXFR-Freight

$request['RequestedShipment'] = array(
		'ShipTimestamp' => date('c'),
		'DropoffType' => 'REGULAR_PICKUP', // valid values REGULAR_PICKUP, REQUEST_COURIER, DROP_BOX, BUSINESS_SERVICE_CENTER and STATION
		'ServiceType' => 'PRIORITY_OVERNIGHT', // valid values STANDARD_OVERNIGHT, PRIORITY_OVERNIGHT, FEDEX_GROUND, ...
		'PackagingType' => 'YOUR_PACKAGING', // valid values FEDEX_BOX, FEDEX_PAK, FEDEX_TUBE, YOUR_PACKAGING, ...
		'Shipper' => addShipper(),
		'Recipient' => addRecipient(),
		//'ShippingChargesPayment' => addShippingChargesPayment(),
		//'LabelSpecification' => addLabelSpecification(),
		//'RateRequestTypes' => array('ACCOUNT'), // valid values ACCOUNT and LIST    
		'PackageCount' => 1,
		'RequestedPackageLineItems' => array(
			'0' => addPackageLineItem1()
		)
	);



function addShipper(){
	$shipper = array(
		'Contact' => array(
			'PersonName' => 'Sender Name',
			'CompanyName' => 'Sender Company Name',
			'PhoneNumber' => '0805522713'
		),
		'Address' => array(
			'StreetLines' => 'Address Line 1',
			'City' => 'Austin',
			'StateOrProvinceCode' => 'TX',
			'PostalCode' => '73301',
			'CountryCode' => 'US'
		)
	);
	return $shipper;
}

function addRecipient(){
	$recipient = array(
		'Contact' => array(
			'PersonName' => 'Recipient Name',
			'CompanyName' => 'Recipient Company Name',
			'PhoneNumber' => '1234567890'
		),
		'Address' => array(
			'StreetLines' => 'Address Line 1',
			'City' => 'Windsor',
			'StateOrProvinceCode' => 'CT',
			'PostalCode' => '06006',
			'CountryCode' => 'US',
			'Residential' => false
		)
	);
	return $recipient;	                                    
}

function addPackageLineItem1(){
	$packageLineItem = array(
		'SequenceNumber'=>1,
		'GroupPackageCount'=>1,
		'Weight' => array(
			//'Value' => 50.5,
			'Value' => 35,
			'Units' => 'LB'
		),
		'Dimensions' => array(
			'Length' => 108,
			'Width' => 5,
			'Height' => 5,
			'Units' => 'IN'
		),
		'CustomerReferences' => array(
			'0' => array(
				'CustomerReferenceType' => 'CUSTOMER_REFERENCE', 
				'Value' => 'CR1234'
			), // valid values CUSTOMER_REFERENCE, INVOICE_NUMBER, P_O_NUMBER and SHIPMENT_INTEGRITY
			'1' => array(
				'CustomerReferenceType' => 'INVOICE_NUMBER', 
				'Value' => 'IV1234'
			),
			'2' => array(
				'CustomerReferenceType' => 'P_O_NUMBER', 
				'Value' => 'PO1234'
			)
		)
	);
	return $packageLineItem;
}

try {
	if(setEndpoint('changeEndpoint')){
		$newLocation = $client->__setLocation(setEndpoint('endpoint'));
	}
	
	$response = $client ->getAllServicesAndPackaging($request);

    if ($response -> HighestSeverity != 'FAILURE' && $response -> HighestSeverity != 'ERROR'){
        echo 'The following service type(s) are available.'. Newline;
       /* echo '<table border="1">';
        foreach ($response->ServiceOptionType as $optionKey => $option){
        	echo '<tr><td><table>';
        	if(is_string($option)){
				echo '<tr><td>' . $optionKey . '</td><td>' . $option . '</td></tr>';
        	}else{           
				foreach($option as $subKey => $subOption){
					echo '<tr><td>' . $subKey . '</td><td>' . $subOption . '</td></tr>';
				}
        	}
        	echo '</table></td></tr>';
        } 
        echo'</table>';*/
        
    	printSuccess($client, $response);
    }else{
        printError($client, $response);
    } 
    
    writeToLog($client);    // Write to log file   
} catch (SoapFault $exception) {
    printFault($exception, $client);
}
?>