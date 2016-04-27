<?php

namespace App\Model;

use Nextras\Orm;


class ZamestnanciRepository extends Repository
{

	/**
	 * Returns possible entity class names for current repository.
	 *
	 * @return string[]
	 */
	public static function getEntityClassNames() : array
	{
		return [
			Zamestnanec::class,
		];
	}

}
