<?php

namespace App\Model;

use Nextras\Orm;


class ObjednavkyMapper extends Mapper
{

	public function getTableName() : string
	{
		return 'Objednavka';
	}

	protected function createStorageReflection()
	{
		$ref = parent::createStorageReflection();
		$ref->addMapping('id', 'objednavkaID');
		return $ref;
	}

}
