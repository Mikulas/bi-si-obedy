<?php

namespace App\Services;

use App\Model;


class JidelniListekAggregator
{

	/** @var Model\JidelniListkyRepository */
	private $jidelniListky;

	public function __construct(Model\JidelniListkyRepository $jidelniListky)
	{
		$this->jidelniListky = $jidelniListky;
	}


	public function getAggregatedJidelniListkyByDate()
	{
		$days = [];
		$jidelniListky = $this->jidelniListky->findUpcoming()
			->orderBy('den', 'ASC')
			->orderBy('restaurace');

		foreach ($jidelniListky as $jidelniListek) {
			$days[$jidelniListek->den->format('Y-m-d')][] = $jidelniListek;
		}
		return $days;
	}

}
