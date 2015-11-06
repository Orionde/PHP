<html>
<head>
<title>Nouvelles</title>
<meta charset="UTF-8"/>
<meta http-equiv="content-type" content="text/html;" />
<meta name="author" content="REYMANN-CONGIO" />
<link rel="stylesheet" type="text/css" href="../view/design/style.css"
</head>


<body>
<header>
	<h1><?php echo $_GET["titre"];?> </h1>
</header>
	<article>
<?php
	
    foreach($table as $a)
	{
		echo '<a href="http://localhost/PHP/projet/controler/afficher_nouvelle.ctrl.php?id='.$a->getID().'&titre='.$_GET["titre"].'">'.$a->getTitre()."</a></br>";
	}
	echo "<br/></br>";
	echo '<a href="http://localhost/projet/controler/afficher_flux.ctrl.php"> Retour vers les flux ! </a>';
?>
	</article>
<footer>
</footer>
</body>
</html>
