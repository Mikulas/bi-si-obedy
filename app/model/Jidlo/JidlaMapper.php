<?php

namespace App\Model;

use Nextras\Orm;
use Nextras\Orm\Entity\Reflection\PropertyMetadata;
use Nextras\Orm\Mapper\IMapper;


class JidlaMapper extends Mapper
{

	public function getTableName()
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


	public function getManyHasManyParameters(PropertyMetadata $sourceProperty, IMapper $targetMapper)
	{
		if ($sourceProperty->name === 'alergeny') {
			return [
				'obsahuje',
				$this->getStorageReflection()->getManyHasManyStoragePrimaryKeys($targetMapper),
			];
		}
		return parent::getManyHasManyParameters($sourceProperty, $targetMapper);
	}

}
