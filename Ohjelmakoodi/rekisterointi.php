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
		require_once 'Aputoiminnot/yhteydenotto.php'; 
	?>
	<div id="main">
		<h1>Rekister�idy</h1>
		<form action="rekisterointiAction.php" method="POST">
		<fieldset>
		<legend>Rekister�inti</legend>
		K�ytt�j�tunnus: 
		<input type="text" name="tunnus"><br><br>
		Anna salasana: 
		<input type="password" name="salasana"><br><br>
		<input type="submit" value="Rekister�idy!">
		</fieldset>
		</form>
	</div>

</body>
</html>