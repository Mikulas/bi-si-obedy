<?php

namespace App\Model;

use Nextras\Orm;


class RestauraceRepository extends Repository
{

	/**
	 * Returns possible entity class names for current repository.
	 *
	 * @return string[]
	 */
	public static function getEntityClassNames()
	{
		return [
			Restaurace::class,
		];
	}

}
