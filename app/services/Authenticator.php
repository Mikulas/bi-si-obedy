<?php
namespace App\Services;
use App\Model\UzivatelskeUctyRepository;
use App\Model\UzivatelskyUcet;
use Nette\Security\AuthenticationException;
use Nette\Security\IAuthenticator;
use Nette\Security\Identity;
use Nette\Security\IIdentity;
class Authenticator implements IAuthenticator
{

	/** @var UzivatelskeUctyRepository */
	private $uzivatelskeUcty;

	public function __construct(UzivatelskeUctyRepository $uzivatelskeUcty) {
		$this->uzivatelskeUcty = $uzivatelskeUcty;
	}

	/**
	 * @return IIdentity
	 * @throws AuthenticationException
	 */
	public function authenticate(array $credentials) {
		list($username, $password) = $credentials;

		/** @var NULL|UzivatelskyUcet $uzivatelskyUcet */
		$uzivatelskyUcet = $this->uzivatelskeUcty->getBy(['username' => $username]);
		if (!$uzivatelskyUcet) {
			throw new AuthenticationException('Uživatel není registrovaný', Authenticator::IDENTITY_NOT_FOUND);
		}

		if (!password_verify($password, $uzivatelskyUcet->heslo)) {
			throw new AuthenticationException('Špatné heslo', Authenticator::INVALID_CREDENTIAL);
		}

		return new Identity($uzivatelskyUcet->id);
	}

}
