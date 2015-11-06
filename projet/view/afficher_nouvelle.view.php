<html>
<head>
	<title>Nouvelle</title>
	<meta charset="UTF-8"/>
	<meta http-equiv="content-type" content="text/html;" />
	<meta name="author" content="REYMANN-CONGIO" />
	<link rel="stylesheet" type="text/css" href="../view/design/style.css"
</head>


<body>
<?php
echo '<header>';
echo '<h1>';
echo $table[0]->getTitre();  
echo '</h1>';
echo '</header>';
?>
<article>
<?php
    foreach($table as $a)
	{
		echo '<img src="'.$a->getImage().'"/></br>';
		print '<p>'.$a->getDescri().'<p>';
		echo '</br>';
		echo 'Lien vers la nouvelle <a href="'.$a->getURL().'" > ici </a></br>'; 
	}
	echo '</br></br></br></br>';
	echo '<a href="http://www-etu-info.iut2.upmf-grenoble.fr/~congiohj/PHP/projet/controler/afficher_nouvelles.ctrl.php?rss='.$a->getRSS_ID().'&titre='.$_GET["titre"].'"> Retour vers le flux : '.$_GET["titre"]. '</a>';
	?>
</article>
<footer>
</footer>
</body>
</html>
