<?php 

function print_array($object){
	echo '<pre style="text-align: left;">'; print_r($object); echo '</pre>';
};

function fetch($conn = null,$query,$params=array()){
	//return array of rows
	$rows = array();
	if(!empty($conn)){
		try {
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare($query);
			$stmt->execute($params);
			if(!$stmt){
				print_array($conn->errorInfo());
			}
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch(PDOException $ex) {
			return 'Failed to fetch: '.$ex->getMessage();
			// return 0;
			// return json_encode(array());
		}
	}
	return $rows;
};