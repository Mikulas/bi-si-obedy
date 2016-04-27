<?php

namespace App\Presenters;

use App\Forms\RegistrationFormFactory;
use Nette;


class RegistrationPresenter extends BasePresenter
{

	/** @var RegistrationFormFactory @inject */
	public $formFactory;

	/**
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentRegistrationForm()
	{
		$form = $this->formFactory->create();

		$form->onSuccess[] = function ($form) {
			$this->flashMessage('Registrace proběhla v pořádku');
			$this->redirect('Homepage:');
		};
		return $form;
	}

}
