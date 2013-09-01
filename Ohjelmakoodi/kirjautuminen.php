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
	?>
	<div id="main">
		<h1>Kirjaudu sis��n</h1>

		<?php
			if(isset($_GET['fail'])){
				echo "<p style='color:red'>VIRHE: K�ytt�j�tunnus ja/tai salasana ovat v��rin!</p>";
			}
		?>
		
		<form action="kirjautumisAction.php?sisaan" method="POST">
		<fieldset>
		<legend>Kirjaudu sis��n</legend>
		K�ytt�j�tunnus: 
		<input type="text" name="tunnus" id="tunnus" />
		Salasana: 
		<input type="password" name="salasana" id="salasana" />
		<input type="submit" value="Kirjaudu" />
		</fieldset>
		</form>
		<a href = "rekisterointi.php">Rekister�idy</a>
	</div>

</body>
</html>
