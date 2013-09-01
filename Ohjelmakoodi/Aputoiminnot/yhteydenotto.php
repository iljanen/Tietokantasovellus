<?php
	try {
   		$yhteys = new PDO("pgsql:host=localhost;dbname=iljavanh",
                        "iljavanh", "4fe0c70d33559d77");
	} catch (PDOException $e) {
     		die("VIRHE: " . $e->getMessage());
	}
       $yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>            
