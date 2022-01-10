<?php
//////////////////////////////////////////////////////////////////
/////////////////  Globalni nastaveni aplikace ///////////////////
//////////////////////////////////////////////////////////////////

//// Pripojeni k databazi ////

/** Adresa serveru. */
const DB_SERVER = "127.0.0.1:3306"; // https://students.kiv.zcu.cz lze 147.228.63.10, ale musite byt na VPN
/** Nazev databaze. */
//define("DB_NAME","kivweb"); Je pro kiv web
const DB_NAME = "db1_vyuka";
/** Uzivatel databaze. */
const DB_USER = "root";
/** Heslo uzivatele databaze */
const DB_PASS = "";






//// Dostupne stranky webu ////

/** Adresar kontroleru. */
const DIRECTORY_CONTROLLERS = "src/Controllers";
const NAMESPACE_DIRECTORY_CONTROLLERS = "App\\Controllers\\";
/** Adresar modelu. */
const DIRECTORY_MODELS = "src/Models";
const NAMESPACE_DIRECTORY_MODELS = null;
/** Adresar sablon */
const DIRECTORY_VIEWS = "src/Views";
const NAMESPACE_DIRECTORY_VIEWS = null;
/** Klic defaultni webove stranky. */
const DEFAULT_WEB_PAGE_KEY = "src/Views/home.latte";
const BASESLASH = '/';
/** Dostupne webove stranky. */
const WEB_PAGES = array(
    'Home' => BASESLASH,
	'Login' => BASESLASH.'login',
	'HobbyGroup' => BASESLASH.'hobbygroup',
	'Schoolroom' => BASESLASH.'schoolroom',
	'Permission' => BASESLASH.'permission',
	'Role' => BASESLASH.'role',
	'User' => BASESLASH.'user',
	'Schedule' => BASESLASH.'schedule',
	'Profile' => BASESLASH.'profile',

);

?>
