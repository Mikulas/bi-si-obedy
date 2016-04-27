<?php

namespace App\Presenters;

use Nette;
use App\Model;


class HomepagePresenter extends BasePresenter
{

	/** @var Model\RepositoryContainer @inject */
	public $orm;

	public function actionDefault()
	{
	}

}
