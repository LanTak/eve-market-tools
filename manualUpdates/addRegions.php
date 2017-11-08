<?php 

require '/var/www/eve/evemarket/public/functions.inc.php';
require '/var/www/eve/vendor/autoload.php';
require '/var/www/eve/generated-conf/config.php';

/* Add them if they are not in there*/
/*$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://esi.tech.ccp.is/latest/universe/regions/?datasource=tranquility",
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
		$region = new Regions();
		$region->setRegionId($d);
		$region->save();
	}
}*/

/*  */

$regions = RegionsQuery::Create()->find();

foreach ($regions as $key => $r) {
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://esi.tech.ccp.is/latest/universe/regions/".$r->getRegionId()."/?datasource=tranquility&language=en-us",
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
		echo $r->getRegionId()."\r\n";
		$r->setName($data['name']);
		$r->setDescription($data['description']);
		$r->save();
		foreach ($data['constellations'] as $i => $v) {
			$con = new Constellations();
			$con->setConstellationsId($v);
			$con->setRegionId($r->getRegionId());
			$con->save();
		}
	}
}