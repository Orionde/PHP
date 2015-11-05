<?php
require_once('RSS.class.php');
require_once('Nouvelle.class.php');
    $dao = new DAO();
Class DAO {
	private $db; // L'objet de la base de donnée

	// Ouverture de la base de donnée
	function __construct() {
		$dsn = 'sqlite:../model/rss.db'; // Data source name
		try {
			$this->db = new PDO($dsn);
		} catch (PDOException $e) {
			exit("Erreur ouverture BD : ".$e->getMessage());
		}
	}
	
	function getDB(){
		return $this->db;
	}

	//////////////////////////////////////////////////////////
	// Methodes CRUD sur RSS
	//////////////////////////////////////////////////////////

	// Crée un nouveau flux à partir d'une URL
	// Si le flux existe déjà on ne le crée pas
	function createRSS($url) {
		$rss = $this->readRSSfromURL($url);
		if ($rss == NULL) {
			try {
				$q = "INSERT INTO RSS (url) VALUES ('$url')";
				$r = $this->db->exec($q);
				if ($r == 0) {
					die("createRSS error: no rss inserted\n");
				}

				return $this->readRSSfromURL($url);
			} catch (PDOException $e) {
				die("PDO Error :".$e->getMessage());
			}
		} else {
			// Retourne l'objet existant
			return $rss;
		}
	}

	// Acces à un objet RSS à partir de son URL
	function readRSSfromURL($url) {
		$q = "SELECT * FROM RSS WHERE url = '$url'";
		$r = $this->db->query($q);
		$result = $r->fetchAll(PDO::FETCH_CLASS, "RSS");
		if($result != NULL)
		{
			foreach($result as $r)
			{
				return $r;
			}
		}
		else
		{
			return NULL;
		}
	}

	// Met à jour un flux
	function updateRSS(RSS $rss) {
		// Met à jour uniquement le titre et la date
		$titre = $this->db->quote($rss->titre());
		$q = "UPDATE RSS SET titre=$titre, date='".$rss->date()."' WHERE url='".$rss->url()."'";
		try {
			$r = $this->db->exec($q);
			if ($r == 0) {
				die("updateRSS error: no rss updated\n");
			}
		} catch (PDOException $e) {
			die("PDO Error :".$e->getMessage());
		}
	}

	//////////////////////////////////////////////////////////
	// Methodes CRUD sur Nouvelle
	//////////////////////////////////////////////////////////

	// Acces à une nouvelle à partir de son titre et l'ID du flux
	function readNouvellefromTitre($titre,$RSS_id) {
		$q = "SELECT * FROM nouvelle WHERE titre = '$titre' AND RSS_id = '$RSS_id'";
		$r = $this->db->query($q);
		$result = $r->fetchAll(PDO::FETCH_CLASS, "RSS");
		return $result;

	}

	// Crée une nouvelle dans la base à partir d'un objet nouvelle
	// et de l'id du flux auquelle elle appartient
	function createNouvelle(Nouvelle $n, $RSS_id) {
		$res = $this->readNouvellefromTitre($n->getTitre(), $RSS_id);
		if($res == NULL)
		{
			$q = 'INSERT INTO nouvelle(titre, description, url, rss_id ) VALUES("'.
				htmlspecialchars($n->getTitre()).'","'.
				htmlspecialchars($n->getDescri()).'","'.
				htmlspecialchars($n->getURL()->textContent).'","'.$RSS_id.
			'")';
			$r=$this->db->exec($q);

		}
	}

	// Met à jour le champ image de la nouvelle dans la base
/*	function updateImageNouvelle(Nouvelle $n)
	{
		$list = 
	}*/

	function getNouvelleFromID($RSS_id)
	{
		$res = "SELECT * FROM Nouvelle WHERE RSS_id = ('$RSS_id')";
		$test = $this->db->query($res);
		if($test == NULL)
			return NULL;
		else
			$rendu = $test->fetchAll(PDO::FETCH_CLASS, "nouvelle");
			return $rendu;
			
		
	}
}
?>
