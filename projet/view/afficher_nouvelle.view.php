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


    foreach($table as $a)
	{
		//mettre l'image à la suite du titre 
		print '<p>'.$a->getDescri().'<p>';
		echo 'Lien vers la nouvelle <a href="'.$a->getURL().'" > ici </a></br>'; 
	}
	
	echo '<a href="http://localhost/projet/controler/afficher_nouvelles.ctrl.php?rss='.$a->getRSS_ID().'&titre='.$_GET["titre"].'"> Retour vers le flux : '.$_GET["titre"]. '</a>';
	?>

<footer>
</footer>
</body>
</html>