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

