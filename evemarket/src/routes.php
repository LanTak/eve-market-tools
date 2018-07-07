<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Propel\Runtime\Propel;
// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
	// Sample log message
	$this->logger->info("Slim-Skeleton '/' route");

	// Render index view
	return $this->renderer->render($response, 'home.phtml', $args);
});

$app->get('/eveauth', function (Request $request, Response $response, array $args) {
	// Sample log message
	$this->logger->info("Slim-Skeleton '/eveauth' route");

	$allGetPut	= $request->getQueryParams();
	$allPostPutVars = $request->getParsedBody();

	print_array($allGetPut);
	if(!empty($allGetPut['code'])){
		$_SESSION['code'] = $allGetPut['code'];
		$code = $allGetPut['code'];

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://login.eveonline.com/oauth/token",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "{\n  \"grant_type\":\"authorization_code\",\n  \"code\":\"$code\"\n}",
			CURLOPT_HTTPHEADER => array(
				"Accept: application/json",
				"Authorization: Basic MDdiOGJiNzRmZTYxNDRhNGIxNDQ1NWQ5NWJiNTM0NGQ6ZGNzbHk3Q2hYUTVmMFVCYUh4RlFHRVRjV2NKRExNUGFwMnhhU0JNeQ==",
				"Cache-Control: no-cache",
				"Content-Type: application/json"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			// echo $response;
			$data = json_decode($response,1);
			// print_array(json_decode($response,1));
			$_SESSION['access_token'] = $data['access_token']; 
			$_SESSION['refresh_token'] = $data['refresh_token'];

			if(!empty($data['access_token'])){
				$toonData = getToonData();
				if(!empty($toonData['CharacterID']) && !empty($toonData['CharacterName'])){
					$_SESSION['CharacterID'] = $toonData['CharacterID']; 
					$_SESSION['CharacterName'] = $toonData['CharacterName'];
				}
			}

			header('Location: /toon');
		}
	}
	// print_array($allPostPutVars);

	// Render index view
	// return $this->renderer->render($response, 'home.phtml', $args);
	
});

$app->get('/logout', function (Request $request, Response $response, array $args) {
	// Sample log message
	$this->logger->info("Slim-Skeleton '/logout' route");

	session_destroy();
	session_start();
	header('Location: /');
});


$app->get('/toon', function (Request $request, Response $response, array $args) {
	return $this->renderer->render($response, 'toon.phtml', $args);
});


// $app->get('/update', function (Request $request, Response $response, array $args) {
// 	$curl = curl_init();

// 	curl_setopt_array($curl, array(
// 		CURLOPT_URL => "https://esi.tech.ccp.is/latest/universe/systems/?datasource=tranquility",
// 		CURLOPT_RETURNTRANSFER => true,
// 		CURLOPT_ENCODING => "",
// 		CURLOPT_MAXREDIRS => 10,
// 		CURLOPT_TIMEOUT => 30,
// 		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// 		CURLOPT_CUSTOMREQUEST => "GET",
// 		CURLOPT_HTTPHEADER => array(
// 			"cache-control: no-cache"
// 		),
// 	));

// 	$response = curl_exec($curl);
// 	$err = curl_error($curl);

// 	curl_close($curl);

// 	if ($err) {
// 		echo "cURL Error #:" . $err;
// 	} else {
// 		// echo $response;
// 		$json = json_decode($response,1);
// 		foreach ($json as $key => $val) {
// 			// echo $val."<br />";
// 			/*$sys = new Systems();
// 			$sys->setSystemId($val);
// 			$sys->save();*/
// 		}
// 	}
// });

$app->get('/test', function (Request $request, Response $response, array $args) {
	print_array($_SESSION);
});

/* how to get variables https://stackoverflow.com/questions/32668186/slim-3-how-to-get-all-get-put-post-variables */

$app->get('/marketDashboard', function (Request $request, Response $response, array $args) {
	// Sample log message
	$this->logger->info("Slim-Skeleton '/marketData' route");
	// Render index view
	return $this->renderer->render($response, 'marketData.phtml', $args);
});

$app->get('/moneyMakers', function (Request $request, Response $response, array $args) {
	// Sample log message
	$this->logger->info("Slim-Skeleton '/moneyMakers' route");
	// Render index view
	return $this->renderer->render($response, 'moneyMakers.phtml', $args);
});

$app->get('/moneyMakers/getSubItems/{id}', function (Request $request, Response $response, array $args) {
	// Sample log message
	$this->logger->info("Slim-Skeleton '/moneyMakers/getSubItems' route");
	// Render index view
	$item = new Types($args['id']);
	// print_array($item->toArray());
	// print_array($item->getSubItems());
	echo $item->getSubItems();
});

$app->get('/moneyMakers/getGroups/{id}', function (Request $request, Response $response, array $args) {
	// Sample log message
	$this->logger->info("Slim-Skeleton '/moneyMakers/getGroups' route");
	// Render index view
	$group = new Groups($args['id']);
	// echo $group->toJson();
	$group->getAllTypes();
});

$app->get('/moneyMakers/getBluePrint/{id}', function (Request $request, Response $response, array $args) {
	// Sample log message
	$this->logger->info("Slim-Skeleton '/moneyMakers/getBluePrint' route");
	
	$item = new Types($args['id']);
	
	$bluePrint = $item->getBluePrint();
	// print_array($bluePrint->toArray());
	if(!empty($bluePrint->getTypeId())){
		echo $bluePrint->toJson();
	}else{
		echo "<h3>Blueprint not found.</h3>";
	}
});

$app->get('/db/searchOrders', function (Request $request, Response $response, array $args) {
	// Sample log message
	$this->logger->info("Slim-Skeleton '/db/searchOrders' route");
	// Render index view
	return $this->renderer->render($response, 'searchOrders.phtml', $args);
});

$app->get('/query/builders', function (Request $request, Response $response, array $args) {
	// Sample log message
	$this->logger->info("Slim-Skeleton '/query/builders' route");
	// Render index view
	return $this->renderer->render($response, 'queryBuilder.phtml', $args);
});

$app->get('/data/home/catOrdersSum', function (Request $request, Response $response, array $args) {
	$conn = Propel::getConnection();
	$allGetVars = $request->getQueryParams();
	// print_array($allGetVars);
	if($allGetVars['regionId'] == "All"){
		$sql = 'SELECT DISTINCT category_name, SUM(volume_total) AS "Total Volume", SUM(volume_remain) AS "Total Volume Remaining", COUNT(*) AS "Total Orders", FORMAT(ROUND(SUM(price)),2) AS "Total ISK" FROM MarketOrders WHERE is_buy_order = '.$allGetVars['byOrder'].' GROUP BY category_id ORDER BY category_name ASC';
	}else{
		$sql = 'SELECT DISTINCT category_name, SUM(volume_total) AS "Total Volume", SUM(volume_remain) AS "Total Volume Remaining", COUNT(*) AS "Total Orders", FORMAT(ROUND(SUM(price)),2) AS "Total ISK" FROM MarketOrders WHERE is_buy_order = '.$allGetVars['byOrder'].' and region_id = '.$allGetVars['regionId'].' GROUP BY category_id ORDER BY category_name ASC';
	}
	// echo $sql;
	$json = array();
	$json['columns'] = array('Category Name', 'Total Volume', 'Total Volume Remaining', 'Total Orders', 'Total isk' );
	$data = fetch($conn, $sql);
	echo json_encode($data);
});

$app->get('/data/home/groupOrders', function (Request $request, Response $response, array $args) {
	$conn = Propel::getConnection();
	$allGetVars = $request->getQueryParams();
	if( $allGetVars['regionId'] == "All"){
		$sql = 'SELECT DISTINCT group_name, SUM(volume_total) AS "Total Volume", SUM(volume_remain) AS "Total Volume Remaining", COUNT(*) AS "Total Orders", FORMAT(ROUND(SUM(price)),2) AS "Total ISK" FROM MarketOrders WHERE is_buy_order = '.$allGetVars['byOrder'].' and category_id = '.$allGetVars['catagoryId'].' GROUP BY group_id ORDER BY group_name ASC';
	}else{
		$sql = 'SELECT DISTINCT group_name, SUM(volume_total) AS "Total Volume", SUM(volume_remain) AS "Total Volume Remaining", COUNT(*) AS "Total Orders", FORMAT(ROUND(SUM(price)),2) AS "Total ISK" FROM MarketOrders WHERE is_buy_order = '.$allGetVars['byOrder'].' and category_id = '.$allGetVars['catagoryId'].' and region_id = '.$allGetVars['regionId'].' GROUP BY group_id ORDER BY group_name ASC';
	}
	$data = fetch($conn, $sql);
	/*$table[] = array('Group Name', 'Total Volume', 'Total Volume Remaining', 'Total Orders', 'Total isk' );
	$data = fetch($conn, $sql);
	foreach ($data as $key => $d) {
		$table[] =$d;
	}
	echo html_table($table);*/
	$data = fetch($conn, $sql);
	echo json_encode($data);
});

$app->get('/data/home/itemOrders', function (Request $request, Response $response, array $args) {
	$conn = Propel::getConnection();
	$allGetVars = $request->getQueryParams();
	if( $allGetVars['regionId'] == "All"){
		$sql = 'SELECT DISTINCT item_name, SUM(volume_total) AS "Total Volume", SUM(volume_remain) AS "Total Volume Remaining", COUNT(*) AS "Total Orders", FORMAT(ROUND(SUM(price)),2) AS "Total ISK" FROM MarketOrders WHERE is_buy_order = '.$allGetVars['byOrder'].' and category_id = '.$allGetVars['catagoryId'].' and group_id = '.$allGetVars['groupId'].' GROUP BY type_id ORDER BY group_name ASC';
	}else{
		$sql = 'SELECT DISTINCT item_name, SUM(volume_total) AS "Total Volume", SUM(volume_remain) AS "Total Volume Remaining", COUNT(*) AS "Total Orders", FORMAT(ROUND(SUM(price)),2) AS "Total ISK" FROM MarketOrders WHERE is_buy_order = '.$allGetVars['byOrder'].' and category_id = '.$allGetVars['catagoryId'].' and region_id = '.$allGetVars['regionId'].' and group_id = '.$allGetVars['groupId'].' GROUP BY type_id ORDER BY group_name ASC';
	}
	// echo $sql;
	$data = fetch($conn, $sql);
	/*$table[] = array('Item Name', 'Total Volume', 'Total Volume Remaining', 'Total Orders', 'Total isk' );
	$data = fetch($conn, $sql);
	foreach ($data as $key => $d) {
		$table[] =$d;
	}
	echo html_table($table);*/
	echo json_encode($data);

});

$app->get('/data/home/getRegions', function (Request $request, Response $response, array $args) {
	// $regions = RegionsQuery::Create()->orderBy('name', 'ASC')->find();
	// echo $regions->toJson();
	// $data = $regions->toArray();
	$conn = Propel::getConnection();
	// $sql = "SELECT DISTINCT region_id FROM orders";
	$sql = "SELECT DISTINCT region_id, COUNT(*) FROM orders GROUP BY region_id ORDER BY COUNT(*) DESC";
	$regions = fetch($conn, $sql);
	// echo print_array($regions);
	$tmp = array();
	foreach ($regions as $key => $region) {
		$r = new Regions($region['region_id']);
		// echo print_array($r->toArray());
		$a = array();
		$a['regionId'] = $r->getRegionId();
		$a['name'] = $r->getName();
		$tmp[] = $a;
		// this who thing is terrible programming but whatever fix it later! dick
	}
	// natsort($tmp); // tried to sort this array it's dumb 
	echo json_encode($tmp);
});

$app->get('/data/home/getCatagories', function (Request $request, Response $response, array $args) {
	$cats = CategoryQuery::Create()->filterByPublished(1)->OrderBy('Name','ASC')->find();
	$tmp = array();
	foreach ($cats as $key => $c) {
		$a = array();
		$a['catagoryId'] = $c->getCategoryId();
		$a['name'] = $c->getName();
		$tmp[] = $a;
	}
	echo json_encode($tmp);
});

$app->get('/getGroupsByCatagory', function (Request $request, Response $response, array $args) {
	$allGetVars = $request->getQueryParams();
	$groups = GroupsQuery::Create()->filterByCategoryId($allGetVars['catagoryId'])->filterByPublished(1)->orderBy('name', 'ASC')->find();
	$tmp = array();
	foreach ($groups as $key => $g) {
		$a = array();
		$a['groupId'] = $g->getGroupId();
		$a['name'] = $g->getName();
		$tmp[] = $a;
	}
	echo json_encode($tmp);
});

$app->get('/getItemsByGroup', function (Request $request, Response $response, array $args) {
	$allGetVars = $request->getQueryParams();
	$items = TypesQuery::Create()->filterByGroupId($allGetVars['groupId'])->filterByPublished(1)->orderBy('name', 'ASC')->find();
	$tmp = array();
	foreach ($items as $key => $i) {
		$a = array();
		$a['itemId'] = $i->getTypeId();
		$a['name'] = $i->getName();
		$tmp[] = $a;
	}
	echo json_encode($tmp);
});

$app->get('/data/home/getOrders', function (Request $request, Response $response, array $args) {
	$conn = Propel::getConnection();
	$allGetVars = $request->getQueryParams();
	if($allGetVars['buyOrder'] == 1){
		$ob = "DESC";
	}else{
		$ob = "ASC";
	}
	$params[0] = $allGetVars['regionId'];
	$params[1] = $allGetVars['typeId'];
	$params[2] = $allGetVars['buyOrder'];

	$sql = "SELECT region_id, location_id,  region_name, item_name, FORMAT(volume_total,0), FORMAT(volume_remain,0), FORMAT(price,2), is_buy_order FROM MarketOrders WHERE region_id = ? AND type_id = ? AND is_buy_order = ? ORDER BY price ".$ob.";";
	$data = fetch($conn, $sql, $params);
	// echo print_array($data);
	$table[] = array( 'Buy/Sell','Location', 'Region', 'Item Name', 'Volume Total', 'Volume Remain', 'Price', 'is_buy_order' );
	foreach ($data as $key => $d) {
		$d['region_id'] = "<div id='$key".$d['region_id']."'><a href='javascript:addOrder(\"$key".$d['region_id']."\", \"".$d['FORMAT(volume_remain,0)']."\", \"".$d['FORMAT(price,2)']."\", ".$allGetVars['buyOrder']."  );' btn='btn btn-succuss'>Add </a></div>";
		$table[] = $d;
		// print_array($d);
	}
	echo html_table($table);
});

require_once 'controllers/dataTableData.php';
require_once 'controllers/queryBuilderData.php';