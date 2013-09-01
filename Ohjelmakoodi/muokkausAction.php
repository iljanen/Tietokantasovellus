<?php	
	require_once 'Aputoiminnot/apu.php';
	require_once 'Aputoiminnot/yhteydenotto.php';

	varmista_kirjautuminen();

	if(empty($_POST['taytteet'])){
		ohjaa('lista.php?fail');
	}

	$kysely = $yhteys->prepare("DELETE FROM tuotteetraakaaineet WHERE pizzaid =?");
	$kysely->execute(array($_GET['id']));

	$kysely = $yhteys->prepare("UPDATE tuotteet SET nimi = ?, hinta = ?, kuvaus = ? WHERE pizzaid = ?");
	$kysely->execute(array($_POST['nimi'], $_POST['hinta'], $_POST['kuvaus'], $_GET['id']));

	$id = $_GET['id'];

	


	foreach($_POST['taytteet'] as $aine){
			$kysely = $yhteys->prepare("INSERT INTO tuotteetRaakaaineet (pizzaid, raakaaineid) values (?, ?)");
			$kysely->execute(array($_GET['id'], $aine));
	}

	ohjaa('lista.php');

?>