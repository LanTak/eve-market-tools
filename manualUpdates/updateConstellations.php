<?php 

require '/var/www/eve/evemarket/public/functions.inc.php';
require '/var/www/eve/vendor/autoload.php';
require '/var/www/eve/generated-conf/config.php';

/* Add them if they are not in there*/

$constellations = ConstellationsQuery::Create()->find();

foreach ($constellations as $key => $con) {
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://esi.tech.ccp.is/latest/universe/constellations/".$con->getConstellationsId()."/?datasource=tranquility&language=en-us",
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
		echo $con->getConstellationsId()."\r\n";
		$con->setName($data['name']);
		$con->save();
	}
}