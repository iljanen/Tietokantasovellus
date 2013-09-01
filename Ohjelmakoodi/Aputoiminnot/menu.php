<?php require_once 'Aputoiminnot/apu.php'; ?>

<ul id="menu">
<li><a href="index.php">P‰‰sivu</a></li>
<li><a href="lista.php">Pizzat</a></li>
<li><a href="yhteystiedot.php">Yhteystiedot</a></li>
<?php if (!on_kirjautunut()) { ?>
	<li><a href="kirjautuminen.php">Kirjaudu sis‰‰n</a></li>
<?php } ?>
<?php if (on_kirjautunut()) { ?>
	<li><a href="kirjautumisAction.php?ulos">Kirjaudu ulos</a></li>
<?php } ?>
</ul> 