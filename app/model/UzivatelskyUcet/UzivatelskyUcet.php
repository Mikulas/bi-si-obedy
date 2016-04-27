<?php

namespace App\Model;

use DateTime;
use Nette\Security\IIdentity;
use Nextras\Orm\Relationships\OneHasMany;
use Nextras\Orm\Relationships\OneHasOne;


/**
 * @property-read int $id {primary}
 * @property string $username
 * @property string $heslo
 * @property int $kredit
 *
 * @property OneHasOne|Zamestnanec $zamestnanec {1:1 Zamestnanec::$uzivatelskyUcet, isMain=true}
 * @property OneHasMany|Objednavka[] $objednavky {1:m Objednavka::$uzivatelskyUcet}
 */
class UzivatelskyUcet extends Entity implements IIdentity
{

	public function __construct()
	{
		parent::__construct();
		$this->kredit = 0;
	}


	/**
	 * Returns the ID of user.
	 *
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}


	/**
	 * Returns a list of roles that the user is a member of.
	 *
	 * @return array
	 */
	public function getRoles()
	{
		return [];
	}

}
