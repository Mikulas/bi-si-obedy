<?php

namespace App\Model;

use Nextras\Orm;


class ObjednavkyRepository extends Repository
{

	/**
	 * Returns possible entity class names for current repository.
	 *
	 * @return string[]
	 */
	public static function getEntityClassNames()
	{
		return [
			Objednavka::class,
		];
	}

}
