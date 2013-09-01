<?php

require_once 'Aputoiminnot/sessio.php';
require_once 'Aputoiminnot/yhteydenotto.php';

function ohjaa($osoite) {
  header("Location: $osoite");
  exit;
}

function on_kirjautunut() {
  global $sessio;
  return isset($sessio->kayttaja_id);
}

function varmista_kirjautuminen() {
  if (!on_kirjautunut()) {
    ohjaa('kirjautuminen.php');
  }
}
