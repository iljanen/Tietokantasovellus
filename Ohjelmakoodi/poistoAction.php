<?php
	header('Location: lista.php');
	require_once 'Aputoiminnot/yhteydenotto.php';
	require_once 'Aputoiminnot/apu.php';

	varmista_kirjautuminen();

	$pizza_id = $_GET['id'];


	$kysely = $yhteys->prepare("DELETE FROM tuotteetRaakaaineet WHERE pizzaid = ?");
	$kysely->execute(array($pizza_id));

	$kysely = $yhteys->prepare("DELETE FROM tuotteet WHERE pizzaid = ?");
	$kysely->execute(array($pizza_id));
?>