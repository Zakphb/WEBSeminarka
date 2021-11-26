<?php
//////////////////////////////////////////////////////////////////
/////////////////  Globalni nastaveni aplikace ///////////////////
//////////////////////////////////////////////////////////////////

//// Pripojeni k databazi ////

/** Adresa serveru. */
define("DB_SERVER","localhost"); // https://students.kiv.zcu.cz lze 147.228.63.10, ale musite byt na VPN
/** Nazev databaze. */
//define("DB_NAME","kivweb"); Je pro kiv web
define("DB_NAME","webseminarka");
/** Uzivatel databaze. */
define("DB_USER","root");
/** Heslo uzivatele databaze */
define("DB_PASS","");






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

/** Dostupne webove stranky. */
const WEB_PAGES = array(
    'Home' => '/',
    'Contact' => '/Contact/contact',
	'Login' => '/login',
	'HobbyGroup' => '/hobbygroup',
	'Schoolroom' => '/schoolroom'
);

?>
