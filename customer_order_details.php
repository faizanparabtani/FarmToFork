<?php
	// Account details
	$apiKey = urlencode('E4GV++pRNXA-Azk2mx2PIHKVsJ7mBejDrV9RGhV0Ts');
	
	// Inbox details
	$inbox_id = '10';
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'inbox_id' => $inbox_id);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/get_messages/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
?>