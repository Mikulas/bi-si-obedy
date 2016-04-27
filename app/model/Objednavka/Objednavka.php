<?php

namespace App\Model;

use DateTime;


/**
 * @property-read int $objednavkaID {primary}
 * @property DateTime $datumDodani
 * @property DateTime $datumSplatnosti
 * @property DateTime $datumZadani
 * @property string $stavObjednavky
 */
class Objednavka extends Entity
{

}
