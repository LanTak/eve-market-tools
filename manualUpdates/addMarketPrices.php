<?php 

require '/var/www/eve/evemarket/public/functions.inc.php';
require '/var/www/eve/vendor/autoload.php';
require '/var/www/eve/generated-conf/config.php';

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://esi.tech.ccp.is/latest/markets/prices/?datasource=tranquility",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


if ($err) {
	echo "cURL Error #:" . $err;
} else {
	// echo $response."\n\r";
	$data = json_decode($response,1);
	foreach ($data as $key => $d) {
		$price = new MarketPrices();
		$price->setTypeId($d['type_id']);
		$price->setAveragePrice($d['average_price']);
		$price->setAdjustedPrice($d['adjusted_price']);
		$price->save();
	}
}