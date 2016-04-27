<?php

namespace App\Presenters;

use Nette;
use App\Model;


class RestaurantsPresenter extends BasePresenter
{

	/** @var Model\RestauraceRepository @inject */
	public $restaurants;

	public function renderList()
	{
		$this->template->restaurants = $this->restaurants->findAll();
	}

}
