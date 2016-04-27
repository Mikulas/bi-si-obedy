<?php

namespace App\Model;

use Nextras\Orm;


class ObjednavkyMapper extends Mapper
{

	public function getTableName() : string
	{
		return 'objednavka';
	}

	protected function createStorageReflection()
	{
		$ref = parent::createStorageReflection();
		$ref->addMapping('id', 'objednavkaID');
		$ref->addMapping('uzivatelskyUcet', 'uzivatelskyUcetID');
		return $ref;
	}

}
