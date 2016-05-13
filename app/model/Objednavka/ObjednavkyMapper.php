<?php

namespace App\Model;

use Nextras\Orm;
use Nextras\Orm\Entity\Reflection\PropertyMetadata;
use Nextras\Orm\Mapper\IMapper;


class ObjednavkyMapper extends Mapper
{

	public function getTableName()
	{
		return 'objednavka';
	}

	protected function createStorageReflection()
	{
		$ref = parent::createStorageReflection();
		$ref->addMapping('id', 'objednavkaID');
		$ref->addMapping('uzivatelskyUcet', 'uzivatelskyUcetID');
		$ref->addMapping('datumDodani', 'datumDodani');
		$ref->addMapping('datumSplatnosti', 'datumSplatnosti');
		$ref->addMapping('datumZadani', 'datumZadani');
		$ref->addMapping('stavObjednavky', 'stavObjednavky');
		return $ref;
	}

	public function getManyHasManyParameters(PropertyMetadata $sourceProperty, IMapper $targetMapper)
	{
		if ($sourceProperty->name === 'jidla') {
			return [
				'jeObjednano',
				$this->getStorageReflection()->getManyHasManyStoragePrimaryKeys($targetMapper),
			];
		}
		return parent::getManyHasManyParameters($sourceProperty, $targetMapper);
	}

}
