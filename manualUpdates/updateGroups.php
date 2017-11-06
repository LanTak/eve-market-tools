<?php 
// this is tooo much info to run in a browser so I am going to have to do this in shell
require '/var/www/eve/evemarket/public/functions.inc.php';
require '/var/www/eve/vendor/autoload.php';
require '/var/www/eve/generated-conf/config.php';

// $groups = GroupsQuery::Create()->limit(10)->find();
$groups = GroupsQuery::Create()->find();

foreach ($groups as $key => $group) {


	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://esi.tech.ccp.is/latest/universe/groups/".$group->getGroupId()."/?datasource=tranquility&language=en-us",
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
		echo $group->getGroupId()."\r\n";
		$data = json_decode($response,1);
		$group->setName($data['name']);
		$group->setPublished($data['published']);
		$group->setCategoryId($data['category_id']);
		$group->save();
	}
}
?>
