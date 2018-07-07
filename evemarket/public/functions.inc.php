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

function html_table_pdf($data = array())
{
	$rows = array();
	foreach ($data as $row) {
		$cells = array();
		foreach ($row as $cell) {
			$cells[] = "<td>{$cell}</td>";
		}
		$rows[] = "<tr>" . implode('', $cells) . "</tr>";
	}
	$html = "<style type=\"text/css\">";
	$html .= "	table {
					width:1000px;
				}
				table, th, td {
					border: 1px solid black;
					border-collapse: collapse;
				}
				th, td {
					padding: 5px;
					text-align: left;
				}
				table tr:nth-child(even) {
					background-color: #eee;
				}
				table tr:nth-child(odd) {
					background-color: #fff;
				}";
	$html .= "</style>";
	$html .=  "<table>" . implode('', $rows) . "</table>";

	return $html;
};


function getToonData(){
	if(!empty($_SESSION['access_token'])){
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://esi.tech.ccp.is/verify/",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer ".$_SESSION['access_token'],
				"Cache-Control: no-cache"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			return json_decode($response,1);
		}
	}
}