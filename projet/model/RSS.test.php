<?php
require_once('RSS.class.php');
$rss = new RSS('http://www.lemonde.fr/m-actu/rss_full.xml');
$rss->update();
echo $rss->getTitre()."\n";
foreach($rss->getNouvelles() as $nouvelle) {
	echo ' '.$nouvelle->getTitre().' '.$nouvelle->getDateP()."\n";
	echo '  '.$nouvelle->getDescri()."\n";
}
?>
