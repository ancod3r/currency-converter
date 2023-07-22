<?php
    $from = $_POST["from_currency"];
    $to = $_POST["to_currency"];
    $amount = $_POST["amount"];

    $string = $from . "_" . $to;

    $curl = curl_init();
	curl_setopt_array($curl, array(
	    CURLOPT_URL => "https://free.currconv.com/api/v7/convert?q=" . $string . "&compact=ultra&apiKey=166dc8efbd4931cfc0b4",
	    CURLOPT_RETURNTRANSFER => 1
	));
	$response = curl_exec($curl);
	echo "<br><br><br>";
	echo '<span style="font-size: 30px;"> Conversion from: ' . $from .' To '. $to.  '</span>';
	echo "<br><br>";
	echo '<span style="font-size: 30px;"> Amount: ' . $amount . '</span>';
	echo "<br><br>";

	$response = json_decode($response, true);
	// echo "<br><br><br>";
	// print_r($response);

	$rate = $response[$string];
	$total = $rate * $amount;

	// echo "  --->  ";
	// print_r($total);
	
	echo '<span style="font-size: 30px;"> Rate: ' . $rate.  '</span>';
	echo "<br><br>";
	echo '<span style="font-size: 30px;"> Converted Amount: ' . $total.  '</span>';
    
	 // https://free.currconv.com/api/v7/convert?q=USD_PHP&compact=ultra&apiKey=166dc8efbd4931cfc0b4
	// Another API Key- 58b86c51c9925887ca58
    // Check API Status - https://free.currencyconverterapi.com/
    // Get New API Key  - https://free.currencyconverterapi.com/free-api-key
    // Main API Site - https://www.currencyconverterapi.com
    // API Documentation - https://www.currencyconverterapi.com/docs
    // Sample Code - https://www.currencyconverterapi.com/docs/sample-code/php
?>