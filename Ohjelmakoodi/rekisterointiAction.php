<?php
	require_once 'Aputoiminnot/apu.php';
	require_once 'Aputoiminnot/yhteydenotto.php';
	require_once 'Aputoiminnot/menu.php';

	$kysely = $yhteys->prepare("SELECT * FROM kayttajat");
	$kysely->execute();
	while($rivi = $kysely->fetch()){
		if($rivi['username'] == $_POST['tunnus']){
			echo 'Not going to happen!';
			ohjaa('index.php?dupelogin');
		}elseif(empty($_POST['tunnus']) || empty($_POST['salasana'])){
			ohjaa('index.php?emptylogin'); 
		}
	}

	$kysely = $yhteys->prepare("INSERT INTO kayttajat (username, password) values(?, ?)");
	if($kysely->execute(array($_POST['tunnus'], $_POST['salasana']))){
		ohjaa('kirjautuminen.php');
	}else{
		ohjaa('index.php');
	}
?>	