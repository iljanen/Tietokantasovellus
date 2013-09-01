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

		$pizza_id = $_GET['id'];
		$kysely = $yhteys->prepare("SELECT * FROM tuotteet WHERE pizzaid = ?");
		$kysely->execute(array($pizza_id));
		$rivi = $kysely->fetch();

		

		
	?>
	<div id='main'>
	<h1>Muokkaa pizzaa: <?php echo $rivi['nimi']; ?></h1>

	<?php
		if(isset($_GET['fail'])){
			echo "<p style='color:red'>VIRHE: et valinnut yht‰k‰‰n t‰ytett‰ pizzaan!</p>";
		}
	?>

	<form action="muokkausAction.php?id=<?php echo $rivi['pizzaid']; ?>" method="post">
		<fieldset>
		<legend>Pizzan muokkaus</legend>
		<p>Pizzan nimi: <input type="text" name="nimi" value="<?php echo $rivi['nimi']; ?>"</p>
		<p>Pizzan hinta: <input type="text" name="hinta" value="<?php echo $rivi['hinta']; ?>"</p>
		<p>Pizzan kuvaus: <input type="text" name="kuvaus" value="<?php echo $rivi['kuvaus']; ?>"</p><br><br>
              <p>Valitse aineet: </p>

		<?php 
			$kysely3 = $yhteys->prepare("SELECT raakaaineid, aine FROM raakaaineet");
			$kysely3->execute();
			while($aineet = $kysely3->fetch()){
				$kysely2 = $yhteys->prepare("SELECT raakaaineid FROM tuotteetraakaaineet WHERE pizzaid =?");
				$kysely2->execute(array($pizza_id));

				while($pizzanaineet = $kysely2->fetch()){
					if($aineet['raakaaineid'] == $pizzanaineet['raakaaineid']){
						echo '<input type="checkbox" name="taytteet[]" value="'.$aineet['raakaaineid'].'" checked>';
						echo $aineet['aine']."<br>";
						break;
					}
					
					
					
					
				}
				if(!($aineet['raakaaineid'] == $pizzanaineet['raakaaineid'])){				
					echo '<input type="checkbox" name="taytteet[]" value="'.$aineet['raakaaineid'].'">';
					echo $aineet['aine']."<br>";
				}
			}
		?>
		<input type="submit" value="Muokkaa pizzaa">
		</fieldset>
		
	</form><br>
	<a href="lista.php">Takaisin listaan</a>	
	</div>
</body>
</html>

		