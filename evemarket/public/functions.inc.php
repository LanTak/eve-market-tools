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

function html_table($data = array())
{
	$rows = array();
	foreach ($data as $row) {
		$cells = array();
		foreach ($row as $cell) {
			$cells[] = "<td>{$cell}</td>";
		}
		$rows[] = "<tr>" . implode('', $cells) . "</tr>";
	}
	return "<div class='table-responsive'><table class='table table-bordered table-hover table-striped table-responsive'>" . implode('', $rows) . "</table></div>";
};

function html_table2($data = array())
{
	$rows = array();
	$html = "<div class='table-responsive'> <table class='table table-bordered table-hover table-striped'>";
	foreach ($data as $key => $value) {
		$html .= "<tr>
					<td>".$key."</td>
					<td>".$value."</td>
				</tr>";
	}
	$html .= "</table><div>";

	return $html;
};