<?php

namespace App\Presenters;

use Latte;
use Nette;
use App\Model;


abstract class BasePresenter extends Nette\Application\UI\Presenter
{

	/** @var Model\UzivatelskeUctyRepository @inject */
	public $uzivatelskeUcty;


	/**
	 * @return NULL|Model\UzivatelskyUcet
	 */
	public function getUserEntity()
	{
		$identity = $this->getUser()->getIdentity();
		if (!$identity) {
			return NULL;
		}
		return $this->uzivatelskeUcty->getById($identity->getId());
	}


	protected function beforeRender()
	{
		parent::beforeRender();

		/** @var Latte\Engine $latte */
		$latte = $this->template->getLatte();
		$latte->addFilter('cs', function($text) {
			return strtr($text, [
				'Monday' => 'pondělí',
				'Tuesday' => 'úterý',
				'Wednesday' => 'středa',
				'Thursday' => 'čtvrtek',
				'Friday' => 'pátek',
				'Saturday' => 'sobota',
				'Sunday' => 'neděle',
			]);
		});

		$this->template->uzivatelskyUcet = $this->getUserEntity();
	}

}
