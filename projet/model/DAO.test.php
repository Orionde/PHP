<?php
require_once('DAO.class.php');

// Test si l'URL existe dans la BD
$url = 'http://www.lemonde.fr/m-actu/rss_full.xml';

$rss = $dao->readRSSfromURL($url);
if ($rss == NULL) {
	echo $url." n'est pas connu\n";
	echo "On l'ajoute ... \n";
	$rss = $dao->createRSS($url);
echo "Oniiiiiiiiiii l'ajoute ... \n";


}


foreach($rss as $t)
{
// Mise à jour du flux
$t->update();
echo $t->getTitre()."\n";
echo $i;

foreach($t->getNouvelles() as $nouvelle) {
	echo ' '.$nouvelle->getTitre().' '.$nouvelle->getDateP()."\n";
	echo '  '.$nouvelle->getDescri()."\n";

}

}
?>
