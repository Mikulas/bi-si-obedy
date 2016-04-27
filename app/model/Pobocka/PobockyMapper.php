<?php

namespace App\Model;

use Nextras\Orm;


class PobockyMapper extends Mapper
{

	public function getTableName() : string
	{
		return 'Pobocka';
	}

	protected function createStorageReflection()
	{
		$ref = parent::createStorageReflection();
		$ref->addMapping('id', 'pobockaID');
		return $ref;
	}

}
