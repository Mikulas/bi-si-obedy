<?php

namespace App\Model;

use Nextras\Orm;
use Nextras\Orm\Entity\Reflection\PropertyMetadata;
use Nextras\Orm\Mapper\IMapper;


class AlergenyMapper extends Mapper
{

	public function getTableName() : string
	{
		return 'alergeny';
	}


	protected function createStorageReflection()
	{
		$ref = parent::createStorageReflection();
		$ref->addMapping('id', 'alergenyID');
		return $ref;
	}


}
