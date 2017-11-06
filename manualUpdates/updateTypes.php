<?php 
// this is tooo much info to run in a browser so I am going to have to do this in shell
require '/var/www/eve/evemarket/public/functions.inc.php';
require '/var/www/eve/vendor/autoload.php';
require '/var/www/eve/generated-conf/config.php';

// $types = TypesQuery::Create()->limit(100)->find();
$types = TypesQuery::Create()->find();

foreach ($types as $key => $type) {


	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://esi.tech.ccp.is/latest/universe/types/".$type->getTypeId()."/?datasource=tranquility&language=en-us",
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
		echo $type->getTypeId()."\r\n";
		$json = json_decode($response,1);
		$type->setName($json['name']);
		$type->setDescription($json['description']);
		// $type->setDescription(iconv(mb_detect_encoding($json['description'], mb_detect_order(), true), "UTF-8", $json['description']));
		$type->setPublished($json['published']);
		$type->setGroupId($json['group_id']);
		$type->setRadius($json['radius']);
		$type->setVolume($json['volume']);
		$type->setPackagedVolume((int)$json['packaged_volume']);
		if(!empty($json['icon_id'])){
			$type->setIconId($json['icon_id']);
		}
		$type->setCapacity($json['capacity']);
		$type->setPortionSize($json['portion_size']);
		$type->setMass((int)$json['mass']);
		if(!empty($json['graphic_id'])){
			$type->setGraphicId($json['graphic_id']);
		}
		if(!empty($json['dogma_attributes'])){
			$type->setDogmaAttributes(true);
		}else{
			$type->setDogmaAttributes(false);
		}
		$type->save();
	}
}
?>
