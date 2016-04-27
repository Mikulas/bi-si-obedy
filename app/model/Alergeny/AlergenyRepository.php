<?php

namespace App\Model;

use Nextras\Orm;


class AlergenyRepository extends Repository
{

	/**
	 * Returns possible entity class names for current repository.
	 *
	 * @return string[]
	 */
	public static function getEntityClassNames() : array
	{
		return [
			Alergen::class,
		];
	}

}
