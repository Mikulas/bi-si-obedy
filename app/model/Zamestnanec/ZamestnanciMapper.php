<?php

namespace App\Model;

use Nextras\Orm;


class ZamestnanciMapper extends Mapper
{

	public function getTableName() : string
	{
		return 'Zamestnanec';
	}

}
