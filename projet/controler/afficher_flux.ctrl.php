<?php
include("../model/DAO.class.php");

if(isset($_POST["flux"])){
	

	if($_POST["flux"]!="vide" || $_POST["flux"])
	{
		$rss = $dao->createRSS($_POST["flux"]);


		if ($rss == NULL)
		{
			$rss = $dao->createRSS($_POST["flux"]);
		}
		$rss->update();
		foreach($rss->getNouvelles() as $nouvelle)
		{
			$query='SELECT id from RSS where url=\''.$_POST["flux"].'\'';
			$r=$dao->getDB()->query($query);
			$result = $r->fetchAll();
			$id = $result[0]["id"];
			$dao->createNouvelle($nouvelle, $id );
		}
		$_POST["flux"]="vide"; //vide $_POST[FLUX]
	}
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
