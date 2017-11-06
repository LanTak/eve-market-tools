<?php 
// this is tooo much info to run in a browser so I am going to have to do this in shell
require '/var/www/eve/evemarket/public/functions.inc.php';
require '/var/www/eve/vendor/autoload.php';
require '/var/www/eve/generated-conf/config.php';

$systems = SystemsQuery::Create()->find();
// $s = SystemsQuery::Create()->findone();
foreach ($systems as $key => $s) {
	echo $s->getSystemId()." \n\r ";

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://esi.tech.ccp.is/latest/universe/systems/".$s->getSystemId()."/?datasource=tranquility&language=en-us",
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
		$json = json_decode($response,1);
		// print_array($json);
		// $s->set
		// echo (int)$json['position']['x']."\n\r";
		// echo (int)$json['position']['y']."\n\r";
		// echo (int)$json['position']['z']."\n\r";
		$s->setName($json['name']);
		$s->setPosX((int)$json['position']['x']);
		$s->setPosY((int)$json['position']['y']);
		$s->setPosZ((int)$json['position']['z']);
		$s->setSecurityStatus($json['security_status']);
		$s->setConstellationId($json['constellation_id']);
		$s->setStarId($json['star_id']);
		if(!empty($json['security_class'])){
			$s->setSecurityClass($json['security_class']);			
		}
		$s->save();
	}

	// exit();
}
?>
