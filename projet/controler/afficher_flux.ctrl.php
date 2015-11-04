<?php
include_once("../model/DAO.class.php");
	
	$q = "SELECT url FROM RSS";
	$r = $dao->getDB()->query($q);
	$result = $r->fetchAll();
	//var_dump($result);
	$i=0;
	foreach($result as $value)
	{
		foreach($value as $val)
		{
			$table[$i]=$val;
			$i++;
		}
	}
	
require_once("../view/afficher_flux.view.php");
?>
