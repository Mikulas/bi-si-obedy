<?php

namespace App\Model;

use Nextras\Orm;


class JidlaMapper extends Mapper
{

	public function getTableName() : string
	{
		return 'Jidlo';
	}


	protected function createStorageReflection()
	{
		$ref = parent::createStorageReflection();
		$ref->addMapping('id', 'jidloID');
		return $ref;
	}

}
