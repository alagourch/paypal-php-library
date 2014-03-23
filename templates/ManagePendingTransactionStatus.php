<?php
// Include required library files.
require_once('../includes/config.php');
require_once('../autoload.php');

// Create PayPal object.
$PayPalConfig = array(
					'Sandbox' => $sandbox,
					'APIUsername' => $api_username,
					'APIPassword' => $api_password,
					'APISignature' => $api_signature
					);

$PayPal = new PayPal\PayPal($PayPalConfig);

// Prepare request arrays
$MPTSFields = array
				(
				'transactionid' => '', 								// Required. Transaction ID of the payment transaction.
				'action' => ''										// Required.  The operation you want to perform on the pending transaction.  Options are: Accept, Deny 
				);
				
$PayPalRequestData = array('MPTSFields'=>$MPTSFields);

// Pass data into class for processing with PayPal and load the response array into $PayPalResult
$PayPalResult = $PayPal->ManagePendingTransactionStatus($PayPalRequestData);

// Write the contents of the response array to the screen for demo purposes.
echo '<pre />';
print_r($PayPalResult);
?>