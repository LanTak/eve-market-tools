<?php 

use Slim\Http\Request;
use Slim\Http\Response;
use Propel\Runtime\Propel;

$app->get('/db/systems', function (Request $request, Response $response, array $args) {
	// Sample log message
	// $this->logger->info("Slim-Skeleton '/db/systems' route");

	// Render index view
	return $this->renderer->render($response, 'dt/systems.phtml', $args);

});

$app->get('/db/systems/data', function (Request $request, Response $response, array $args) {
	require 'datatables.php';
	// DB table to use
	$table = 'systems';
	 
	// Table's primary key
	$primaryKey = 'system_id';
	 
	// Array of database columns which should be read and sent back to DataTables.
	// The `db` parameter represents the column name in the database, while the `dt`
	// parameter represents the DataTables column identifier. In this case simple
	// indexes
	$columns = array(
		array( 'db' => 'system_id', 'dt' => 0 ),
		array( 'db' => 'name', 'dt' => 1 ),
		array( 'db' => 'security_status', 'dt' => 2 ),
		array( 'db' => 'constellation_id', 'dt' => 3 ),
		array( 'db' => 'star_id', 'dt' => 4 ),
		array( 'db' => 'security_class', 'dt' => 5 )
	);


	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	* If you just want to use the basic configuration for DataTables with PHP
	* server-side, there is no need to edit below this line.
	*/
	$conn = Propel::getConnection();
	echo json_encode(
		SSP::simple( $_GET, $conn, $table, $primaryKey, $columns )
	);
});

$app->get('/db/types', function (Request $request, Response $response, array $args) {
	// Sample log message
	// $this->logger->info("Slim-Skeleton '/db/systems' route");

	// Render index view
	return $this->renderer->render($response, 'dt/types.phtml', $args);

});

$app->get('/db/types/data', function (Request $request, Response $response, array $args) {
	require 'datatables.php';
	// DB table to use
	$table = 'types';
	 
	// Table's primary key
	$primaryKey = 'type_id';
	 
	// Array of database columns which should be read and sent back to DataTables.
	// The `db` parameter represents the column name in the database, while the `dt`
	// parameter represents the DataTables column identifier. In this case simple
	// indexes
	$columns = array(
		array( 'db' => 'type_id', 'dt' => 0 ),
		array( 'db' => 'name', 'dt' => 1 ),
		array( 'db' => 'description', 'dt' => 2 ),
		array( 'db' => 'published', 'dt' => 3 ),
		array( 'db' => 'group_id', 'dt' => 4 ),
		array( 'db' => 'radius', 'dt' => 5 ),
		array( 'db' => 'volume', 'dt' => 6 ),
		array( 'db' => 'packaged_volume', 'dt' => 7 ),
		array( 'db' => 'icon_id', 'dt' => 8 ),
		array( 'db' => 'capacity', 'dt' => 9 ),
		array( 'db' => 'portion_size', 'dt' => 10 ),
		array( 'db' => 'mass', 'dt' => 11 ),
		array( 'db' => 'graphic_id', 'dt' => 12 ),
		array( 'db' => 'dogma_attributes', 'dt' => 13 )
	);

	$conn = Propel::getConnection();
	echo json_encode(
		SSP::simple( $_GET, $conn, $table, $primaryKey, $columns )
	);
});

$app->get('/db/MarketData/data', function (Request $request, Response $response, array $args) {
	require 'datatables.php';
	// DB table to use
	$table = 'MarketData';
	 
	// Table's primary key
	$primaryKey = 'type_id';
	 
	// Array of database columns which should be read and sent back to DataTables.
	// The `db` parameter represents the column name in the database, while the `dt`
	// parameter represents the DataTables column identifier. In this case simple
	// indexes
	$columns = array(
		array( 'db' => 'category_name', 'dt' => 0 ),
		array( 'db' => 'group_name', 'dt' => 1 ),
		array( 'db' => 'type_name', 'dt' => 2 ),
		array( 'db' => 'average_price', 'dt' => 3, 'formatter' => function($d, $row){ 
			return "$".number_format($d,2);
		}),
		array( 'db' => 'adjusted_price', 'dt' => 4, 'formatter' => function($d, $row){ 
			return "$".number_format($d,2);
		})
	);


	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	* If you just want to use the basic configuration for DataTables with PHP
	* server-side, there is no need to edit below this line.
	*/
	$conn = Propel::getConnection();
	echo json_encode(
		SSP::simple( $_GET, $conn, $table, $primaryKey, $columns )
	);
});

$app->get('/data/chart/main', function (Request $request, Response $response, array $args) {
	$conn = Propel::getConnection();

	$sql = "SELECT DISTINCT `category_name`,  count(*) as 'total',  ROUND(SUM(average_price), 2) as 'sum' FROM `MarketData` GROUP BY `category_name`";

	$data = fetch($conn, $sql);
	echo json_encode($data);
	/*foreach ($data as $key => $d) {
		$tmp1[] = $d['category_name'];
		$tmp2[] = $d['total'];
		$tmp3[] = $d['sum'];
	}
	$t['a1'] = $tmp1;
	$t['a2'] = $tmp2;
	$t['a3'] = $tmp3;
	echo json_encode($t);*/

});