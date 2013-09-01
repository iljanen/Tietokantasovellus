<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>PHPizzeria</title>
	<meta http-equiv="Content-Type" 
		content="text/html;charset=ISO-8859-1" pageEncoding="ISO-8859-1"></meta>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php
		header('Content-Type: text/html; charset=ISO-8859-1');
		require_once 'Aputoiminnot/menu.php';
		require_once 'Aputoiminnot/apu.php';
		require_once 'Aputoiminnot/yhteydenotto.php';

		varmista_kirjautuminen();
	?>



	<div id='main'>

	<?php 

		$kysely = $yhteys->prepare("SELECT MAX(pizzaid) as pizzaid from tuotteet");
		$kysely->execute();
		$rivi = $kysely->fetch();
		$id = $rivi['pizzaid'];
	
		echo $id;

		if(empty($_POST['taytteet'])){
			$kysely = $yhteys->prepare("DELETE FROM tuotteet WHERE pizzaid = ?");
			$kysely->execute(array($id));
			ohjaa('lista.php?fail');
		}
		
		foreach($_POST['taytteet'] as $aine){
			$kysely = $yhteys->prepare("INSERT INTO tuotteetRaakaaineet (pizzaid, raakaaineid) values (?, ?)");
			$kysely->execute(array($id, $aine));
		}

		ohjaa('lista.php');
		
	?>

	</div>
</body>
</html>