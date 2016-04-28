<?php

namespace App\Model;

use DateTime;
use Nextras\Orm\Relationships\ManyHasMany;


/**
 * @property-read int $id {primary}
 * @property DateTime $datumDodani
 * @property DateTime $datumSplatnosti
 * @property DateTime $datumZadani
 * @property string $stavObjednavky {default self::STATE_ZADANA}
 *
 * @property UzivatelskyUcet $uzivatelskyUcet {m:1 UzivatelskyUcet::$objednavky}
 * @property ManyHasMany|Jidlo[] $jidla {m:m Jidlo::$objednavky, isMain=true}
 */
class Objednavka extends Entity
{

	const STATE_ZADANA = 'zadana';
	const STATE_ODESLANA = 'odeslana';
	const STATE_UHRAZENA = 'uhrazena';
	const STATE_DODANA = 'dodana';
	const STATE_VYRIZENA = 'vyrizena';

}
