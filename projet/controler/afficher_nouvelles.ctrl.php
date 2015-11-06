<?php
include("../model/DAO.class.php");
require_once("../model/Nouvelle.class.php");
	
	$rss=$_GET['rss'];
	$result = $dao->getNouvelleFromID($rss);
	var_dump($result);
	$i=0;
	foreach($result as $value)
	{
			$table[$i]=$value;
			$i++;
	}
	
require_once("../view/afficher_nouvelles.view.php");
?>