<?php

namespace App\Model;

use DateTime;
use Nextras\Orm\Relationships\ManyHasMany;


/**
 * @property-read int $objednavkaID {primary}
 * @property DateTime $datumDodani
 * @property DateTime $datumSplatnosti
 * @property DateTime $datumZadani
 * @property string $stavObjednavky
 *
 * @property UzivatelskyUcet $uzivatelskyUcet {m:1 UzivatelskyUcet::$objednavky}
 * @property ManyHasMany|Jidlo[] $jidla {m:m Jidlo::$objednavky}
 */
class Objednavka extends Entity
{

}
