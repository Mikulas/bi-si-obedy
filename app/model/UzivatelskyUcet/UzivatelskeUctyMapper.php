<?php

namespace App\Model;

use Nextras\Orm;


class UzivatelskeUctyMapper extends Mapper
{

	public function getTableName() : string
	{
		return 'UzivatelskyUcet';
	}


	protected function createStorageReflection()
	{
		$ref = parent::createStorageReflection();
		$ref->addMapping('id', 'uzivatelskyUcetID');
		return $ref;
	}

}
