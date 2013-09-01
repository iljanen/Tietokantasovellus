<?php
require_once 'Aputoiminnot/apu.php';
require_once 'Aputoiminnot/sessio.php';
require_once 'Aputoiminnot/yhteydenotto.php';

if(isset($_GET['sisaan'])){

	$kysely = $yhteys->prepare("SELECT id FROM kayttajat WHERE username = ? AND password = ?");
	$kysely->execute(array($_POST['tunnus'], $_POST['salasana']));
	$kayttaja = $kysely->fetchObject();

	if($kayttaja){
		$sessio->kayttaja_id = $kayttaja->id;
		ohjaa('index.php');
	}else{
		ohjaa('kirjautuminen.php?fail');
	}
}elseif(isset($_GET['ulos'])){
	unset($sessio->kayttaja_id);
	ohjaa('index.php');
}else{
	die('Ei ymmärrä toimintoa');
}
?>