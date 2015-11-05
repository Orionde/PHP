<html>
<head>
<title>Nouvelle</title>
<meta charset="UTF-8"/>
<meta http-equiv="content-type" content="text/html;" />
<meta name="author" content="REYMANN-CONGIO" />
<link rel="stylesheet" type="text/css" href="../view/design/style.css"
</head>


<body>
<header>
<h1>Nouvelle </h1>
</header>

<?php
    foreach($table as $a)
	{
		print '<p>'.$a->getTitre().'<p>';
		//mettre l'image à la suite du titre 
		print '<p>'.$a->getDescri().'<p>';
		
	}
?>

<footer>
</footer>
</body>
</html>