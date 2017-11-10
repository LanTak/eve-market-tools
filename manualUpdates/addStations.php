<?php 

require '/var/www/eve/evemarket/public/functions.inc.php';
require '/var/www/eve/vendor/autoload.php';
require '/var/www/eve/generated-conf/config.php';

/* Add Loop through Regions */
use Propel\Runtime\Propel;


$conn = Propel::getConnection();
$sql = "SELECT DISTINCT location_id FROM orders";

$stations = fetch($conn, $sql);
$count = count($stations);

foreach ($stations as $key => $station) {
	echo "$key of $count ".$station['location_id']."\n\r";
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://esi.tech.ccp.is/latest/universe/stations/".$station['location_id']."/?datasource=tranquility",
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
	} else{
		// echo $response."\n\r";
		$d = json_decode($response,1);
		
		$s = new Station();
		$s->setStationId($d['station_id']);
		$s->setName($d['name']);
		$s->setTypeId($d['type_id']);
		$s->setSystemId($d['system_id']);
		$s->setReprocessingEfficiency($d['reprocessing_efficiency']);
		$s->setReprocessingStationsTake($d['reprocessing_stations_take']);
		$s->setMaxDockableShipVolume($d['max_dockable_ship_volume']);
		$s->setOfficeRentalCost($d['office_rental_cost']);
		$s->setServices(json_encode($d['services']));
		$s->setOwner($d['owner']);
		$s->setRaceId($d['race_id']);
		$s->save();
	}
}