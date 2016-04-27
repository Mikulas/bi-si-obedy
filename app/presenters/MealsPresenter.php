<?php

namespace App\Presenters;

use App\Services\JidelniListekAggregator;
use Nette;
use App\Model;


class MealsPresenter extends BasePresenter
{

	/** @var JidelniListekAggregator @inject */
	public $aggregator;

	public function renderList()
	{
		$days = $this->aggregator->getAggregatedJidelniListkyByDate();
		$this->template->days = $days;
	}

}
