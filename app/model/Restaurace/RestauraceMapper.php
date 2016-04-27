<?php

namespace App\Model;

use Nextras\Orm;


class RestauraceMapper extends Mapper
{

	public function getTableName() : string
	{
		return 'restaurace';
	}


	protected function createStorageReflection()
	{
		$ref = parent::createStorageReflection();
		$ref->addMapping('id', 'restauraceID');
		return $ref;
	}

}
