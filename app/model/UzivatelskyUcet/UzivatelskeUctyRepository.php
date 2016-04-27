<?php

namespace App\Model;

use Nextras\Orm;


class UzivatelskeUctyRepository extends Repository
{

	/**
	 * Returns possible entity class names for current repository.
	 *
	 * @return string[]
	 */
	public static function getEntityClassNames() : array
	{
		return [
			UzivatelskyUcet::class,
		];
	}

}
