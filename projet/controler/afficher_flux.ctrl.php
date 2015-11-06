<?php
include("../model/DAO.class.php");
	
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
