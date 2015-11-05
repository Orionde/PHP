<?php
require_once('DAO.class.php');

// Test si l'URL existe dans la BD
$url = 'http://www.lemonde.fr/m-actu/rss_full.xml';


$rss = $dao->readRSSfromURL($url);

if ($rss == NULL)
{
	echo $url." n'est pas connu\n";
	echo "On l'ajoute ... \n";
	$rss = $dao->createRSS($url);
}

$rss->update();
echo $rss->getTitre();
$i = 0;
foreach($rss->getNouvelles() as $nouvelle)
{
	echo $nouvelle->getTitre();
	$dao->createNouvelle($nouvelle, $i );
	$i++;
}

?>
