<?php

namespace App\Model;

use Nextras\Orm;


class AlergenyMapper extends Mapper
{

	public function getTableName() : string
	{
		return 'Alergeny';
	}


	protected function createStorageReflection()
	{
		$ref = parent::createStorageReflection();
		$ref->addMapping('id', 'alergenyID');
		return $ref;
	}

}
