<?php
include("../model/DAO.class.php");
require_once("../model/Nouvelle.class.php");
	
	$id=$_GET['id'];
	$q = "SELECT * FROM Nouvelle where id=".(int)$id;
	$r = $dao->getDB()->query($q);
	$result = $r->fetchAll(PDO::FETCH_CLASS, "Nouvelle");
	//var_dump($result);
	$i=0;
	foreach($result as $value)
	{
			$table[$i]=$value;
			$i++;
	}
	
require_once("../view/afficher_nouvelle.view.php");
?>