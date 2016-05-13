<?php

namespace App\Model;

use Nextras\Orm;


class UzivatelskeUctyMapper extends Mapper
{

	public function getTableName()
	{
		return 'uzivatelskyucet';
	}


	protected function createStorageReflection()
	{
		$ref = parent::createStorageReflection();
		$ref->addMapping('id', 'uzivatelskyUcetID');
		$ref->addMapping('zamestnanec', 'zamestnanecID');
		return $ref;
	}

}
