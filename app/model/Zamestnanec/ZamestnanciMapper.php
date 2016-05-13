<?php

namespace App\Model;

use Nextras\Orm;


class ZamestnanciMapper extends Mapper
{

	public function getTableName()
	{
		return 'zamestnanec';
	}


	protected function createStorageReflection()
	{
		$ref = parent::createStorageReflection();
		$ref->addMapping('id', 'zamestnanecID');
		$ref->addMapping('rodneCislo', 'rodneCislo');
		$ref->addMapping('pobocka', 'pobockaID');
		return $ref;
	}

}
