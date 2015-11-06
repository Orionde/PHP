<!doctype html>
<head>
	<title>Flux rss</title>
	<meta charset="UTF-8"/>
	<meta http-equiv="content-type" content="text/html;" />
	<meta name="author" content="REYMANN-CONGIO" />
	<link rel="stylesheet" type="text/css" href="../view/design/style.css"
</head>

<body>

<header>
<h1>Flux </h1>
</header>
<article>
<?php
    foreach($table as $a)
	{
		echo '<a href="http://localhost/PHP/projet/controler/afficher_nouvelles.ctrl.php?rss='.$a->getID().'&titre='.$a->getTitre().'" >'.$a->getTitre().'</a></br>';

	}
	
	echo '</br>';
	echo '<a href="http://localhost/PHP/projet/controler/ajout_flux.php">Ajouter un flux </a>';
?>
</article>
<footer>
</footer>
</body>
</html>
