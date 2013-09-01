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

		$kysely = $yhteys->prepare("SELECT * FROM tuotteet ORDER BY pizzaid");
		$kysely->execute();

		
	?>
	<div id='main'>
	<?php	

		if(isset($_GET['fail'])){
			echo "<p style='color:red'>VIRHE: et valinnut raaka-aineita pizzaan!</p>";
		}
		echo "<table border>";
		while ($rivi = $kysely->fetch()) {
			if($rivi["nimi"] !=null){
				$id = $rivi["pizzaid"];
				echo "<tr>";				
				echo "<td>" . $rivi["nimi"] . "</td>";
				echo "<td>" . $rivi["hinta"] . "</td>";
				echo "<td>" . $rivi["kuvaus"] . "</td>";			
				$kysely2 = $yhteys->prepare("SELECT r.* FROM raakaaineet r INNER JOIN tuotteetRaakaaineet tr on r.raakaaineId = tr.raakaaineId INNER JOIN tuotteet t on tr.pizzaId = t.pizzaId WHERE tr.pizzaId = ?");
				$kysely2->execute(array($id));
				echo "<td>";
				while($rivi1=$kysely2->fetch()){
					echo "" . $rivi1["aine"] . "  ";
				}
				echo "</td>";
				if (on_kirjautunut()){				
					echo "<td><a href='muokkaa.php?id=$id'>Muokkaa</a></td>";
					echo "<td><a href='poistoAction.php?id=$id'>Poista</a></td>";
				}
				echo "</tr>";
			}
		}
		echo "</table>";

		if(on_kirjautunut()){
			echo "<form action='lisays.php'>";
			echo "<input type='submit' value='Lisää pizza'>";
		}		
	?>
	</div>
</body>
</html>