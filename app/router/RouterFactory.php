<?php

namespace App;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;


class RouterFactory
{

	/**
	 * @param bool $https
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter(bool $https)
	{
		if ($https) {
			Route::$defaultFlags |= Route::SECURED;
		}

		$router = new RouteList;
		$router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
		return $router;
	}

}
