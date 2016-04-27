<?php

namespace App\Model;

use Nextras\Orm;


/**
 * @method Orm\Collection\ICollection|JidelniListek[] findUpcoming()
 */
class JidelniListkyRepository extends Repository
{

	/**
	 * Returns possible entity class names for current repository.
	 *
	 * @return string[]
	 */
	public static function getEntityClassNames() : array
	{
		return [
			JidelniListek::class,
		];
	}

}
