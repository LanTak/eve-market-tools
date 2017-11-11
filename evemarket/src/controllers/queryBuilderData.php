<?php 

use Slim\Http\Request;
use Slim\Http\Response;
use Propel\Runtime\Propel;

// is_buy_order = 0 selling
// is_buy_order = 1 buying

$app->get('/db/dataSearch', function (Request $request, Response $response, array $args) {

	
	$allGetVars = $request->getQueryParams();

	if(!empty($allGetVars['min']) && !empty($allGetVars['max'])){
		$conn = Propel::getConnection();
		$sql = "SELECT DISTINCT type_id, MIN(price) as 'min' FROM orders WHERE is_buy_order = 0 AND price BETWEEN ? AND ? GROUP BY type_id ORDER BY MIN(price) ASC";
		$params = array( $allGetVars['min'], $allGetVars['max'] );
		$table[] = array('Item Id', 'Min Buy Price', 'Max Sell Price', 'Variance' );
		$data = fetch($conn, $sql, $params);
		foreach ($data as $key => $d) {
			// print_array($d);
			$qu = OrdersQuery::Create()->filterByTypeId($d['type_id'])->filterByIsBuyOrder(1)->orderBy('price','DESC')->findOne();
			if(!empty($qu)){
				$d['max'] = $qu->getPrice();
				$d['margin'] =  $d['max'] - $d['min'];
				if($d['margin'] > 0){
					$d['type_id'] = "<a href='javascript:getItemInfo(\"".$d['type_id']."\");'>".$d['type_id']."</a>";
					$table[] = $d;
				}
			}
		}
		$pos = count($table) - 1;
		echo "Total Items:".count($data). "  Total Positive $pos";
		echo html_table($table);
	}

});

$app->get('/db/getBuy', function (Request $request, Response $response, array $args) {
	$allGetVars = $request->getQueryParams();
	if(!empty($allGetVars['type_id'])){
		$conn = Propel::getConnection();
		// $sql = "SELECT region_name,category_name,group_name,item_name,volume_total,volume_remain,price FROM MarketOrders WHERE type_id = ? AND is_buy_order = 0 ORDER BY price ASC";
		$sql = "SELECT region_name,item_name,volume_total,volume_remain,price FROM MarketOrders WHERE type_id = ? AND is_buy_order = 0 ORDER BY price ASC";
		$params = array( $allGetVars['type_id'] );
		$table[] = array('region_name', 'item_name', 'volume_total', 'volume_remain', 'price' );
		$data = fetch($conn, $sql, $params);
		foreach ($data as $key => $d) {
			$d['price'] = number_format($d['price'],0);
			$d['volume_remain'] = number_format($d['volume_remain'],0);
			$d['volume_total'] = number_format($d['volume_total'],0);
 			$table[] = $d;
		}
		echo html_table($table);
	}
});

$app->get('/db/getSell', function (Request $request, Response $response, array $args) {
	$allGetVars = $request->getQueryParams();
	if(!empty($allGetVars['type_id'])){
		$conn = Propel::getConnection();
		$sql = "SELECT region_name,item_name,volume_total,volume_remain,price FROM MarketOrders WHERE type_id = ? AND is_buy_order = 1 ORDER BY price DESC";
		$params = array( $allGetVars['type_id'] );
		$table[] = array('region_name', 'item_name', 'volume_total', 'volume_remain', 'price' );
		$data = fetch($conn, $sql, $params);
		foreach ($data as $key => $d) {
			$d['price'] = number_format($d['price'],0);
			$d['volume_remain'] = number_format($d['volume_remain'],0);
			$d['volume_total'] = number_format($d['volume_total'],0);
			$table[] = $d;
		}
		echo html_table($table);
	}
});