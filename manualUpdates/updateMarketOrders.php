<?php 

require '/var/www/eve/evemarket/public/functions.inc.php';
require '/var/www/eve/vendor/autoload.php';
require '/var/www/eve/generated-conf/config.php';

/* Add Loop through Regions */

$page = 1;

do {

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://esi.tech.ccp.is/latest/markets/10000002/orders/?datasource=tranquility&order_type=all&page=".$page,
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
		$page = 0;
		exit();
	} else if($response == "[]"){
		echo $page."  is empty stoping. \r\n";
		$page = 0;
		exit();
	} else{
		$data = json_decode($response,1);
		foreach ($data as $key => $d) {
			echo $page." ".$d['order_id']."\r\n";
			$order = new Orders();
			$order->setOrderId($d['order_id']);
			$order->setRegionId(10000002);
			$order->setTypeId($d['type_id']);
			$order->setLocationId($d['location_id']);
			$order->setVolumeTotal($d['volume_total']);
			$order->setVolumeRemain($d['volume_remain']);
			$order->setMinVolume($d['min_volume']);
			$order->setPrice($d['price']);
			$order->setIsBuyOrder($d['is_buy_order']);
			$order->setDuration($d['duration']);
			$order->setIssued($d['issued']);
			$order->save();
		}
		
	}

	$page++;
} while ($page != 0);

?>