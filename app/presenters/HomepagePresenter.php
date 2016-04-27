<?php

namespace App\Presenters;

use Nette;
use App\Model;


class HomepagePresenter extends BasePresenter
{

	/** @var Model\RepositoryContainer @inject */
	public $orm;

	public function renderDefault()
	{
		$this->orm->alergeny->findAll();

		$this->template->anyVariable = 'any value';
	}

}
