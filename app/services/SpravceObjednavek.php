<?php

namespace App\Services;

use App\Model\Jidlo;
use App\Model\ObjednavkyRepository;
use App\Model\RepositoryContainer;
use App\Model\UzivatelskeUctyRepository;
use App\Model\UzivatelskyUcet;


class SpravceObjednavek
{

	/** @var RepositoryContainer */
	private $repositoryContainer;


	public function __construct(RepositoryContainer $repositoryContainer)
	{
		$this->repositoryContainer = $repositoryContainer;
	}


	public function zapisObjednavku(UzivatelskyUcet $uzivatel, Jidlo $jidlo)
	{
		if ($uzivatel->kredit < $jidlo->cena) {
			throw new SpravceObjednavekException("Nemáte dostatečný kredit ({$uzivatel->kredit},–) pro objednání jídla ({$jidlo->cena},–).");
		}

		// todo mutex

		// najit objednavky co uz v tom dni byli
		// todo pokud uz nejakou objednavku mel, zrusit ji a pripsat zpet kredity

		$uzivatel->kredit -= $jidlo->cena;

		$this->repositoryContainer->uzivatelskeucty->persist($uzivatel);
		$this->repositoryContainer->flush();
	}

}
