<?php

namespace App\Presenters;

use Nette;
use App\Model;


/**
 * Base presenter for all application presenters.
 */
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

		$this->template->uzivatelskyUcet = $this->getUserEntity();
	}

}
