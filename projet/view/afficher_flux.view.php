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
<?php
    foreach($table as $a)
	{
		echo '<a href="http://localhost/PHP/projet/controler/afficher_nouvelles.ctrl.php?rss='.$a->getID().'&titre='.$a->getTitre().'" >'.$a->getTitre().'</a>';

	}
?>
<footer>
</footer>
</body>
</html>
