<?php

namespace App\Model;

use Nextras\Orm;


class RestauraceMapper extends Mapper
{

	public function getTableName() : string
	{
		return 'Restaurace';
	}

}
