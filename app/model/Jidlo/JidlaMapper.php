<?php

namespace App\Model;

use Nextras\Orm;


class JidlaMapper extends Mapper
{

	public function getTableName() : string
	{
		return 'jidlo';
	}


	protected function createStorageReflection()
	{
		$ref = parent::createStorageReflection();
		$ref->addMapping('id', 'jidloID');
		$ref->addMapping('jidelniListek', 'jidelniListekID');
		return $ref;
	}

}
