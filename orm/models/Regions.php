<?php

use Base\Regions as BaseRegions;

/**
 * Skeleton subclass for representing a row from the 'regions' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Regions extends BaseRegions
{
	public function __construct($id = null){
		if(!empty ($id) && is_numeric($id)){
			$this->loadByPK($id);
		}
	}

	public function loadByPK($id = null){
		$r = RegionsQuery::Create()->findPK($id);
		$this->fromArray($r->toArray());
		$this->setNew(false);
	}
}
