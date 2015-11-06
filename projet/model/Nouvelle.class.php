<?php
class Nouvelle
{
	private $titre;
	private $description;
	private $date;
	private $image;
	private $url;
	private $RSS_id;
	
	function getTitre()
	{
		return $this->titre;
	}
	function getDescri()
	{
		return $this->description;
	}
	function get_Date()
	{
		return $this->date;
	}
	
	function getImage()
	{
		return $this->image;
	}
	function getURL()
	{
		return $this->url;
	}
	function getRSS_ID()
	{
		return $this->RSS_id;
	}
	
	function getID()
	{
		return $this->id;
	}
	function update(DOMElement $item)
	{
		$nodeList = $item->getElementsByTagName('title');
		$this->titre = $nodeList->item(0)->textContent;
		$nodeList = $item->getElementsByTagName('pubDate');
		$this->datePubli  = $nodeList->item(0)->textContent;
		
		$nodeList = $item->getElementsByTagName('description');
		$this->descri  = $nodeList->item(0)->textContent;
		
		$nodeList = $item->getElementsByTagName('enclosure');
		$this->image = $nodeList->item(0);
		
		$nodeList = $item->getElementsByTagName('link');
		$this->url = $nodeList->item(0);

	}
	function downloadImage(DOMElement $item, $imageID)
	{
		$nodeList = $item->getElementsByTagName('enclosure');
		$node = $nodeList->item(0);
		$node = $node->attributes->getNamedItem('url');
		if($node != null)
		{
			$url = $node->nodeValue;
			$this->image = 'images/'.$imageID.'.jpg';
			file_put_contents($this->image, file_get_contents($url));
		}
	}
}
?>