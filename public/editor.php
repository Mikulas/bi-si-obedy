<?php

define('SOURCE_DIR', __DIR__ . '/../vendor/adminer/');

if (!isset($_GET['file']) && !isset($_GET['pgsql'])) {
	header('Location: ' . $_SERVER['REQUEST_URI'] . '?pgsql');
	die;
}

/** @var \Nette\DI\Container $container */
$container = require __DIR__ . '/../app/bootstrap.php';

function adminer_object() {
	// required to run any plugin
	include_once SOURCE_DIR . 'plugins/plugin.php';

	// autoloader
	foreach (glob(SOURCE_DIR . 'plugins/*.php') as $filename) {
		include_once $filename;
	}

	$plugins = array(
		// specify enabled plugins here
//		new AdminerDumpXml,
//		new AdminerTinymce,
//		new AdminerFileUpload("data/"),
//		new AdminerSlugify,
//		new AdminerTranslation,
//		new AdminerForeignSystem,
	);

	class AdminerCustomization extends AdminerPlugin {
		public function name() {
			// custom name in title and heading
			return 'BI-SI-Obědy administrace';
		}

		private function getParam($param)
		{
			global $container;
			return $container->getParameters()['dbal'][$param];
		}

		public function database() {
			// database name, will be escaped by Adminer
			return $this->getParam('dbname');
		}

		public function credentials() {
			// server, username and password for connecting to database
			return array($this->getParam('host'), $this->getParam('username'), $this->getParam('password'));
		}

		public function login($login, $password) {
			// validate user submitted credentials
			return ($login === 'admin' && $password == '');
		}

		public function tableName($tableStatus) {
			switch ($tableStatus['Name']) {
				case 'zamestnanec':
					return 'Zaměstnanci';
				case 'alergeny':
					return 'Alergeny';
				case 'jidelnilistek':
					return 'Jídelní lístky';
				case 'jidlo':
					return 'Jídla';
				case 'objednavka':
					return 'Objednávky';
				case 'pobocka':
					return 'Pobočky';
				case 'restaurace':
					return 'Restaurace';
				case 'uzivatelskyucet':
					return 'Uživatelé';
				case 'jeObjednano':
				case 'migrations':
				case 'obsahuje':
					return NULL; // ignore
				default:
					return h($tableStatus["Comment"]);
			}
		}

		public function fieldName($field, $order = 0) {
			if ($field['field'] === 'heslo') {
				return NULL;
			}
			return h($field['field']);
			// only columns with comments will be displayed and only the first five in select
			return ($order <= 5 && !preg_match('~_(md5|sha1)$~', $field["field"]) ? h($field["comment"]) : "");
		}
	}

	return new AdminerCustomization($plugins);
}

// include original Adminer or Adminer Editor
include SOURCE_DIR . '/editor.php';
