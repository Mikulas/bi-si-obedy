<?php

namespace App\Model;

use Nextras\Orm;


class JidelniListkyMapper extends Mapper
{

	public function getTableName() : string
	{
		return 'jidelnilistek';
	}

	protected function createStorageReflection()
	{
		$ref = parent::createStorageReflection();
		$ref->addMapping('id', 'jidelniListekID');
		return $ref;
	}

}
