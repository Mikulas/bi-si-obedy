<?php

namespace App\Model;

use Nextras\Orm;


class ObjednavkyMapper extends Mapper
{

	public function getTableName() : string
	{
		return 'Objednavka';
	}

}
