<?php
include("../model/DAO.class.php");
	
	
	
	$url = 'http://www.lemonde.fr/m-actu/rss_full.xml';
	$rss = $dao->createRSS($url);


	if ($rss == NULL)
	{
	echo $url." n'est pas connu\n";
	echo "On l'ajoute ... \n";
	$rss = $dao->createRSS($url);
	}
	$rss->update();
	foreach($rss->getNouvelles() as $nouvelle)
	{
	$query="SELECT id from RSS where url='$url'";
	$r=$dao->getDB()->query($query);
	$result = $r->fetchAll();
	$id = $result[0]["id"];
	$dao->createNouvelle($nouvelle, $id );
}

	$q = "SELECT * FROM RSS";
	$r = $dao->getDB()->query($q);
	$result = $r->fetchAll(PDO::FETCH_CLASS, "RSS");
	$i=0;
	foreach($result as $value)
	{

			$table[$i]=$value;
			$dao->updateRss($value);
			$i++;
		
	}
	
require_once("../view/afficher_flux.view.php");
?>
