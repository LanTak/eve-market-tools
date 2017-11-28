<?php

use Base\Groups as BaseGroups;

/**
 * Skeleton subclass for representing a row from the 'groups' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Groups extends BaseGroups
{
	public function __construct($id = null){
		if(!empty ($id) && is_numeric($id)){
			$this->loadByPK($id);
		}
	}

	public function loadByPK($id = null){
		$g = GroupsQuery::create()->findPK($id);
		$this->fromArray($g->toArray());
		$this->setNew(false);
	}

	public function getAllTypes(){
		if(!empty($this->getGroupId())){
			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://esi.tech.ccp.is/latest/universe/groups/".$this->getGroupId()."/?datasource=tranquility&language=en-us",
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
				// return $response;
				$json = json_decode($response,1);
				$tmp = array();
				foreach ($json['types'] as $key => $t) {
					$type = new Types($t);
					$tmp[] = $type->toArray();
				}
				echo json_encode($tmp);
			}
		}
	}

	public function getInfoFromEve(){
		if(!empty($this->getGroupId())){
			
		}
	}
}
