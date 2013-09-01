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
		require_once 'Aputoiminnot/apu.php';
		require_once 'Aputoiminnot/menu.php';
		require_once 'Aputoiminnot/yhteydenotto.php';

		varmista_kirjautuminen();
		
	?>
	<div id='main'>
	
	<h1>Pizzan lisäys</h1>

	<form action="aineidenLisays.php" method="post">
	<fieldset>
	<legend>Lisättävän pizzan tiedot</legend>
	<p>Nimi: <br>
	<input type="text" name="nimi"></p>
	<p>Hinta: <br>
	<input type="text" name="hinta"></p>
	<p>Kuvaus: <br>
	<input type="text" name="kuvaus"></p>
	<input type="submit" value="Lisää pizza">
	</fieldset>
	</form>
	</div>

