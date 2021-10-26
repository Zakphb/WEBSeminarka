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


//// Nazvy tabulek v DB ////

///** Tabulka s pohadkami. */
//define("TABLE_INTRODUCTION", "orionlogin_mvc_introduction");
///** Tabulka s uzivateli. */
//define("TABLE_USER", "orionlogin_mvc_user");


//// Dostupne stranky webu ////

/** Adresar kontroleru. */
const DIRECTORY_CONTROLLERS = "app\Controllers";
/** Adresar modelu. */
const DIRECTORY_MODELS = "app\Models";
/** Adresar sablon */
const DIRECTORY_VIEWS = "app\Views";

/** Klic defaultni webove stranky. */
const DEFAULT_WEB_PAGE_KEY = "/";

/** Dostupne webove stranky. */
const WEB_PAGES = array(
    'home' => '/',
    'contact' => '/Contact/contact',
);

?>
