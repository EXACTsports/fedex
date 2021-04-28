<?php
// Copyright 2009, FedEx Corporation. All rights reserved.
// Version 12.0.0

require_once('D:\htdocs\PHP\RateService\fedex-common.php5');

$newline = "<br />";
//The WSDL is not included with the sample code.
//Please include and reference in $path_to_wsdl variable.
$path_to_wsdl = "D:\WSDL_2020\RateService_v28.wsdl";

ini_set("soap.wsdl_cache_enabled", "0");
 
$client = new SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information

$request['WebAuthenticationDetail'] = array(
	'ParentCredential' => array(
		'Key' => getProperty('parentkey'),
		'Password' => getProperty('parentpassword')
	),
	'UserCredential' =>array(
		'Key' => getProperty('key'), 
		'Password' => getProperty('password')
	)
); 
$request['ClientDetail'] = array(
	'AccountNumber' => getProperty('shipaccount'), 
	'MeterNumber' => getProperty('meter')
);
$request['TransactionDetail'] = array('CustomerTransactionId' => ' *** SmartPost Rate Request using PHP ***');
$request['Version'] = array(
	'ServiceId' => 'crs', 
	'Major' => '28', 
	'Intermediate' => '0', 
	'Minor' => '0'
);
$request['ReturnTransitAndCommit'] = true;
$request['RequestedShipment']['DropoffType'] = 'REGULAR_PICKUP'; // valid values REGULAR_PICKUP, REQUEST_COURIER, ...
$request['RequestedShipment']['ShipTimestamp'] = date('c');
$request['RequestedShipment']['ServiceType'] = 'SMART_POST'; // valid values STANDARD_OVERNIGHT, PRIORITY_OVERNIGHT, FEDEX_GROUND, ...
$request['RequestedShipment']['PackagingType'] = 'YOUR_PACKAGING'; // valid values FEDEX_BOX, FEDEX_PAK, FEDEX_TUBE, YOUR_PACKAGING, ...
$request['RequestedShipment']['Shipper'] = addShipper();
$request['RequestedShipment']['Recipient'] = addRecipient();
$request['RequestedShipment']['ShippingChargesPayment'] = addShippingChargesPayment();														 
$request['RequestedShipment']['SmartPostDetail'] = addSmartPostDetail();
$request['RequestedShipment']['PackageCount'] = '1';
$request['RequestedShipment']['RequestedPackageLineItems'] = addPackageLineItem1();



try {
	if(setEndpoint('changeEndpoint')){
		$newLocation = $client->__setLocation(setEndpoint('endpoint'));
	}
	
	$response = $client -> getRates($request);
        
    if ($response -> HighestSeverity != 'FAILURE' && $response -> HighestSeverity != 'ERROR'){
        $rateReply = $response -> RateReplyDetails;
    	echo '<table border="1">';
        echo '<tr><td>Service Type</td><td>Amount</td><td>Transit Time</td><td>Max Transit Time</tr><tr>';
    	$serviceType = '<td>'.$rateReply -> ServiceType . '</td>';
        if($rateReply->RatedShipmentDetails && is_array($rateReply->RatedShipmentDetails)){
			$amount = '<td>$' . number_format($rateReply->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount,2,".",",") . '</td>';
		}elseif($rateReply->RatedShipmentDetails && ! is_array($rateReply->RatedShipmentDetails)){
			$amount = '<td>$' . number_format($rateReply->RatedShipmentDetails->ShipmentRateDetail->TotalNetCharge->Amount,2,".",",") . '</td>';
		} 
        if(array_key_exists('TransitTime',$rateReply->CommitDetails)){
        	$transitTime= '<td>' . $rateReply->CommitDetails->TransitTime . '</td>';
        }else{
        	$transitTime= '<td>' . $rateReply->DeliveryTimestamp . '</td>';
        }
        if(array_key_exists('MaximumTransitTime',$rateReply->CommitDetails)){
        	$maxTransitTime= '<td>' . $rateReply->CommitDetails->MaximumTransitTime . '</td>';
        }else{
        	$maxTransitTime= '<td>' . 'not working' . '</td>';
        }
        echo $serviceType . $amount. $transitTime. $maxTransitTime;
        echo '</tr>';
        echo '</table>';
    	
    	printSuccess($client, $response);
    }else{
        printError($client, $response);
    } 
    
    writeToLog($client);    // Write to log file   
} catch (SoapFault $exception) {
   printFault($exception, $client);        
}



function addShipper(){
	$shipper = array(
		'Contact' => array(
			'PersonName' => 'Sender Name',
			'CompanyName' => 'Sender Company Name',
			'PhoneNumber' => '9012638716'
		),
		'Address' => getProperty('address1')
	);
	return $shipper;
}
function addRecipient(){
	$recipient = array(
		'Contact' => array(
			'PersonName' => 'Recipient Name',
			'CompanyName' => 'Company Name',
			'PhoneNumber' => '9012637906'
		),
		'Address' => getProperty('address2')
	);
	return $recipient;	                                    
}
function addShippingChargesPayment(){
	$shippingChargesPayment = array(
		'PaymentType' => 'SENDER', // valid values RECIPIENT, SENDER and THIRD_PARTY
		'Payor' => array(
			'ResponsibleParty' => array(
				'AccountNumber' => getProperty('billaccount'),
				'CountryCode' => 'US'
			)
		)
	);
	return $shippingChargesPayment;
}
function addSmartPostDetail(){
	$smartPostDetail = array( 
		'Indicia' => 'PARCEL_SELECT',
		'AncillaryEndorsement' => 'CARRIER_LEAVE_IF_NO_RESPONSE',
        'SpecialServices' => 'USPS_DELIVERY_CONFIRMATION',
        'HubId' => getProperty('hubid'),
        'CustomerManifestId' => 'XXX'
	);
	return $smartPostDetail;
}
function addPackageLineItem1(){
	$packageLineItem = array( 
		'SequenceNumber' => 1,
		'GroupPackageCount' => 1,
		'Weight' => array(
			'Value' => 2.0,
			'Units' => 'LB'
		),
 		'Dimensions' => array(
 			'Length' => 10,
			'Width' => 10,
			'Height' => 3,
			'Units' => 'IN'
		)
	);
	return $packageLineItem;
}
?>