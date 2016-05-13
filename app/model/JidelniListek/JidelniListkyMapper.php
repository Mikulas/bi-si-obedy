<?php

namespace App\Model;

use Nextras\Orm;


class JidelniListkyMapper extends Mapper
{

	public function getTableName()
	{
		return 'jidelnilistek';
	}

	protected function createStorageReflection()
	{
		$ref = parent::createStorageReflection();
		$ref->addMapping('id', 'jidelniListekID');
		$ref->addMapping('platnostOd', 'platnostOd');
		$ref->addMapping('platnostDo', 'platnostDo');
		$ref->addMapping('restaurace', 'restauraceID');
		return $ref;
	}


	public function findUpcoming()
	{
		return $this->connection->query('
			SELECT * FROM %table
			WHERE "platnostOd"::date > Now()::date
		', $this->getTableName());
	}

}
