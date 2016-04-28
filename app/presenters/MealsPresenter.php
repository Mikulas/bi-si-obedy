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

	/** @var Model\RepositoryContainer @inject */
	public $repositoryContainer;


	public function renderList()
	{
		$days = $this->aggregator->getAggregatedJidelniListkyByDate();
		$this->template->days = $days;
	}


	private function validateHandle($jidloId)
	{
		if (!$this->getUser()->isLoggedIn()) {
			$this->error('Přihlaste se', Nette\Http\IResponse::S401_UNAUTHORIZED);
		}

		/** @var Model\Jidlo $jidlo */
		$jidlo = $this->repositoryContainer->jidla->getById($jidloId);
		if (!$jidlo) {
			$this->error('Neexistující jídlo', Nette\Http\IResponse::S400_BAD_REQUEST);
		}
		return $jidlo;
	}


	public function handleOrder($jidloId)
	{
		$jidlo = $this->validateHandle($jidloId);
		try {
			$this->spravceObjednavek->zapisObjednavku($this->getUserEntity(), $jidlo);
			$this->flashMessage("{$jidlo->nazev}, got it", 'success');

		} catch (SpravceObjednavekException $e) {
			$this->flashMessage($e->getMessage(), 'danger');
		}

		$this->repositoryContainer->flush();
		$this->redirect('this');
	}


	public function handleCancelOrder($jidloId)
	{
		$jidlo = $this->validateHandle($jidloId);
		try {
			$this->spravceObjednavek->zrusObjednavku($this->getUserEntity()->getObjednavkaForDay($jidlo->jidelniListek->den));
			$this->flashMessage("Zrušena objednávka jídla {$jidlo->nazev}", 'success');

		} catch (SpravceObjednavekException $e) {
			$this->flashMessage($e->getMessage(), 'danger');
		}

		$this->repositoryContainer->flush();
		$this->redirect('this');
	}

}
