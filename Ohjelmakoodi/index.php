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
	require_once 'Aputoiminnot/menu.php'; ?>
	<div id="main">
		<h1>PHPizzeria</h1>

		<?php 
		if(on_kirjautunut()){ 
		echo "<p>Vain rajoitetun ajan kaikki pizzat 0e!</p>";
		}
		elseif(!on_kirjautunut()){
		echo "<p>Liity jäseneksi!</p>";
		} ?>

		<?php
			if(isset($_GET['dupelogin'])){
				echo "<p style='color:red'>VIRHE: Tunnus on jo olemassa, kokeile uudestaan!</p>";
			}
			if(isset($_GET['emptylogin'])){
				echo "<p style='color:red'>VIRHE: Tunnus ja salasana eivät voi olla tyhjiä!</p>";
			}
		?>
	</div>

</body>
</html>
