<?php

require('Nouvelle.class.php');

class RSS
{
	private $titre; // Titre du flux
	private $url;   // Chemin URL pour télécharger un nouvel état du flux
	private $date;  // Date du dernier téléchargement du flux
	private $nouvelles; //Objet Nouvelle

	// Contructeur
	/*function __construct($url)
	{
		if($url != null)
			$this->url = $url;
	}*/

	// Fonctions getter
	function getTitre()
	{
		return $this->titre;
	}
	function getUrl()
	{
		return $this->url;
	}

	function get_Date()
	{
		return $this->date;
	}	

	function getNouvelles()
	{
		return $this->nouvelles;
	}

	function update()
	{
		$doc = new DOMDocument;
		
		$doc->load($this->url);

		$nodeList = $doc->getElementsByTagName('title');
		$this->titre = $nodeList->item(0)->textContent;

		$nodeList = $doc->getElementsByTagName('pubDate');
		$this->date = $nodeList->item(0)->textContent;

		$imageID = 1;

		foreach($doc->getElementsByTagName('item') as $node)
		{
			$nouvelle = new Nouvelle();

			// Met à jour la nouvelle avec l'information téléchargée
			$nouvelle->update($node);
			// Téléchage l'image
			$nouvelle->downloadImage($node,$imageID);
			$this->nouvelles[$imageID] = $nouvelle;
			$imageID++;
		}
	}
}
?>
