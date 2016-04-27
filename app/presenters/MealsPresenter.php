<?php

namespace App\Presenters;

use App\Services\JidelniListekAggregator;
use App\Services\SpravceObjednavek;
use App\Services\SpravceObjednavekException;
use Nette;
use App\Model;


class MealsPresenter extends BasePresenter
{

	/** @var JidelniListekAggregator @inject */
	public $aggregator;

	/** @var SpravceObjednavek @inject */
	public $spravceObjednavek;

	/** @var Model\JidlaRepository @inject */
	public $jidla;


	public function renderList()
	{
		$days = $this->aggregator->getAggregatedJidelniListkyByDate();
		$this->template->days = $days;
	}


	public function handleOrder($jidloId)
	{
		if (!$this->getUser()->isLoggedIn()) {
			$this->error('Přihlaste se', Nette\Http\IResponse::S401_UNAUTHORIZED);
		}

		/** @var Model\Jidlo $jidlo */
		$jidlo = $this->jidla->getById($jidloId);
		if (!$jidlo) {
			$this->error('Neexistující jídlo', Nette\Http\IResponse::S400_BAD_REQUEST);
		}

		try {
			$this->spravceObjednavek->zapisObjednavku($this->getUserEntity(), $jidlo);
			$this->flashMessage("{$jidlo->nazev}, got it");

		} catch (SpravceObjednavekException $e) {
			$this->flashMessage($e->getMessage(), 'danger');
		}

		$this->redirect('this');
	}

}
