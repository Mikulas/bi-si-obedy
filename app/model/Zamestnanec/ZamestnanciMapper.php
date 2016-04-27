<?php

namespace App\Model;

use Nextras\Orm;


class ZamestnanciMapper extends Mapper
{

	public function getTableName() : string
	{
		return 'Zamestnanec';
	}


	protected function createStorageReflection()
	{
		$ref = parent::createStorageReflection();
		$ref->addMapping('id', 'zamestnanecID');
		return $ref;
	}

}
