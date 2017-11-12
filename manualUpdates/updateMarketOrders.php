<?php 

require '/var/www/eve/evemarket/public/functions.inc.php';
require '/var/www/eve/vendor/autoload.php';
require '/var/www/eve/generated-conf/config.php';

/* Add Loop through Regions */
use Propel\Runtime\Propel;


$conn = Propel::getConnection();
// $sql = "SELECT * FROM regions WHERE region_id != 10000002 AND region_id != 10000033";
// $sql = "SELECT * FROM regions where region_id = 10000033";
// $sql = "SELECT DISTINCT regions.region_id, regions.name FROM systems JOIN constellations ON systems.constellation_id = constellations.constellations_id LEFT JOIN regions ON constellations.region_id = regions.region_id WHERE security_status > .51 GROUP BY regions.region_id";
// $regions = fetch($conn, $sql);

$regions = array(
	array( // row #0
		'region_id' => 10000001,
		'name' => 'Derelik',
	),
	array( // row #1
		'region_id' => 10000002,
		'name' => 'The Forge',
	),
	array( // row #2
		'region_id' => 10000016,
		'name' => 'Lonetrek',
	),
	array( // row #3
		'region_id' => 10000020,
		'name' => 'Tash-Murkon',
	),
	array( // row #4
		'region_id' => 10000028,
		'name' => 'Molden Heath',
	),
	array( // row #5
		'region_id' => 10000030,
		'name' => 'Heimatar',
	),
	array( // row #6
		'region_id' => 10000032,
		'name' => 'Sinq Laison',
	),
	array( // row #7
		'region_id' => 10000033,
		'name' => 'The Citadel',
	),
	array( // row #8
		'region_id' => 10000036,
		'name' => 'Devoid',
	),
	array( // row #9
		'region_id' => 10000037,
		'name' => 'Everyshore',
	),
	array( // row #10
		'region_id' => 10000038,
		'name' => 'The Bleak Lands',
	),
	array( // row #11
		'region_id' => 10000042,
		'name' => 'Metropolis',
	),
	array( // row #12
		'region_id' => 10000043,
		'name' => 'Domain',
	),
	array( // row #13
		'region_id' => 10000044,
		'name' => 'Solitude',
	),
	array( // row #14
		'region_id' => 10000048,
		'name' => 'Placid',
	),
	array( // row #15
		'region_id' => 10000049,
		'name' => 'Khanid',
	),
	array( // row #16
		'region_id' => 10000052,
		'name' => 'Kador',
	),
	array( // row #17
		'region_id' => 10000054,
		'name' => 'Aridia',
	),
	array( // row #18
		'region_id' => 10000064,
		'name' => 'Essence',
	),
	array( // row #19
		'region_id' => 10000065,
		'name' => 'Kor-Azor',
	),
	array( // row #20
		'region_id' => 10000067,
		'name' => 'Genesis',
	),
	array( // row #21
		'region_id' => 10000068,
		'name' => 'Verge Vendor',
	),
	array( // row #22
		'region_id' => 10000069,
		'name' => 'Black Rise',
	),
);


// echo print_array($regions);
// echo var_dump($regions);
// exit();

// $regions = RegionsQuery::Create()->find(); // do this one day

foreach ($regions as $key => $r) {
	echo $r['region_id']." ".$r['name']."\r\n";
	$log = new ActivityLog();
	$log->setStartTime(strtotime("now"));
	$log->setEndTime(strtotime("now"));
	$log->setActivity("Region orders update to ".$r['region_id']." ".$r['name']);
	$log->setObjectId($r['region_id']);
	$log->save();

	$page = 1;
	$response = "something";
	do {

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://esi.tech.ccp.is/latest/markets/".$r['region_id']."/orders/?datasource=tranquility&order_type=all&page=".$page,
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

		echo $r['region_id']." ".$r['name']." Page:".$page."\r\n";

		if ($err) {
			echo "cURL Error #:" . $err;
			// $page = 0;
			// exit();
		} else if($response == "[]"){
			echo $r['region_id']." ".$r['name']." Page:".$page."  is empty stoping. \r\n";
			// $page = 0;
			// exit();
		} else{
			$data = json_decode($response,1);
			foreach ($data as $key => $d) {
				// echo $r['region_id']." ".$r['name']." Page:".$page." ".$d['order_id']."\r\n";
				$order = new Orders();
				$order->setOrderId($d['order_id']);
				$order->setRegionId($r['region_id']);
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
			$log->setEndTime(strtotime("now"));
			$log->setApiPages($page);
			$log->save();
		}
		
		$page++;
	} while ($response != "[]");
}


	

?>