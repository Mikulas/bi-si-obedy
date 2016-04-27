<?php

namespace App\Forms;

use App\Model\UzivatelskeUctyRepository;
use App\Model\UzivatelskyUcet;
use App\Model\ZamestnanciRepository;
use App\Model\Zamestnanec;
use Nette;
use Nette\Application\UI\Form;
use Nette\Security\Identity;
use Nette\Security\User;


class RegistrationFormFactory extends Nette\Object
{

	const VALIDATE_DOMAIN = self::class . '::validateDomain';

	/** @var FormFactory */
	private $factory;

	/** @var string[] */
	private $allowedDomains;

	/** @var ZamestnanciRepository */
	private $zamestnanci;

	/** @var UzivatelskeUctyRepository */
	private $uzivatele;

	/** @var Zamestnanec */
	private $zamestnanec;

	/** @var User */
	private $user;


	/**
	 * @param FormFactory $factory
	 * @param string[]    $domainsAllowed
	 */
	public function __construct(array $domainsAllowed, FormFactory $factory, ZamestnanciRepository $zamestnanci, UzivatelskeUctyRepository $uzivatele, User $user)
	{
		$this->factory = $factory;
		$this->allowedDomains = $domainsAllowed;
		$this->uzivatele = $uzivatele;
		$this->zamestnanci = $zamestnanci;
		$this->user = $user;
	}


	/**
	 * @return Form
	 */
	public function create()
	{
		$form = $this->factory->create();
		$form->addText('email', 'Email')
			->setRequired('Zadejte prosím svůj firemní email.')
			->addRule(Form::EMAIL, 'Vyplňte prosím validní email')
			->addRule(self::VALIDATE_DOMAIN, 'Musíte použít email z firemní domény: ' . implode(', ', $this->allowedDomains) . '.',
				$this->allowedDomains);

		$form->addPassword('password', 'Heslo')
			->setRequired('Zadejte prosím jaké heslo si přejete vytvořit.');

		$form->addSubmit('send', 'Registrovat se');

		$form->onValidate[] = [$this, 'formValidate'];
		$form->onSuccess[] = [$this, 'formSucceeded'];
		return $form;
	}


	static public function validateDomain(Nette\Forms\Controls\BaseControl $input, $allowedDomains)
	{
		$email = $input->getValue();
		list($_, $domain) = explode('@', $email) + [NULL, NULL];
		foreach ($allowedDomains as $allowedDomain) {
			if (strToLower($domain) === strToLower($allowedDomain)) {
				return TRUE;
			}
		}
		return FALSE;
	}


	public function formValidate(Form $form, $values)
	{
		$this->zamestnanec = $this->zamestnanci->getBy(['email' => $values['email']]);
		if (!$this->zamestnanec) {
			$form->addError("Zaměstnanec s emailem '{$values['email']}' neexistuje, nelze vytvořit uživatelský účet.");
			return FALSE;
		}
		return TRUE;
	}


	public function formSucceeded(Form $form, $values)
	{
		$uzivatel = new UzivatelskyUcet();
		$uzivatel->zamestnanec = $this->zamestnanec;
		$uzivatel->username = explode('@', $values['email'])[0];
		$uzivatel->heslo = password_hash($values['password'], PASSWORD_BCRYPT);
		$this->uzivatele->persistAndFlush($uzivatel);

		$this->user->login(new Identity($uzivatel->id));
	}

}
