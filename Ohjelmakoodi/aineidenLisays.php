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
		require_once 'Aputoiminnot/yhteydenotto.php';

		$kysely = $yhteys->prepare("INSERT INTO tuotteet (nimi, hinta, kuvaus) values (?, ?, ?)");
		$kysely->execute(array($_POST['nimi'], $_POST['hinta'], $_POST['kuvaus']));
	?>
	<div id='main'>
		Lisäsit pizzan: <?php echo $_POST['nimi']; ?><br>
		valitse lisukkeet pizzaan:<br>
	<form action="lisaysAction.php" method="post">
	<?php
		
		$kysely = $yhteys->prepare("SELECT aine, raakaaineId FROM raakaaineet");
		$kysely->execute();
		while($rivi=$kysely->fetch()){
			echo '<input type="checkbox" name="taytteet[]" value="'.$rivi['raakaaineid'].'">';
			echo $rivi["aine"]."<br>";
		}
	?>
	<input type="submit" value="Lisää aineet">
	</form>
	
</body>
</html>