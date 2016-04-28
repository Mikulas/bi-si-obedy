<?php

namespace App\Services;

use App\Model\Jidlo;
use App\Model\Objednavka;
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
		$den = $jidlo->jidelniListek->den;

		// najit objednavky co uz v tom dni byli
		$puvodniObjednavka = $uzivatel->getObjednavkaForDay($den);
		// todo pokud uz nejakou objednavku mel, zrusit ji a pripsat zpet kredity
		if ($puvodniObjednavka) {
			$this->zrusObjednavku($puvodniObjednavka);
		}

		if ($uzivatel->kredit < $jidlo->cena) {
			throw new SpravceObjednavekException("Nemáte dostatečný kredit ({$uzivatel->kredit},–) pro objednání jídla ({$jidlo->cena},–).");
		}

		$objednavka = new Objednavka();
		$objednavka->datumDodani = $den;
		$objednavka->datumZadani = $den;
		$objednavka->datumSplatnosti = $den;
		$objednavka->jidla->add($jidlo);
		$objednavka->uzivatelskyUcet = $uzivatel;
		$this->repositoryContainer->objednavky->persist($objednavka);

		// todo mutex
		$uzivatel->kredit -= $jidlo->cena;

		$this->repositoryContainer->uzivatelskeucty->persist($uzivatel);
	}


	public function zrusObjednavku(Objednavka $objednavka)
	{
		// todo mutex
		foreach ($objednavka->jidla as $jidlo) {
			$objednavka->uzivatelskyUcet->kredit += $jidlo->cena;
		}
		$this->repositoryContainer->uzivatelskeucty->persist($objednavka->uzivatelskyUcet);

		$this->repositoryContainer->objednavky->remove($objednavka);
	}

}
