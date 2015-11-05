<?php
class Nouvelle
{
	private $titre;
	private $descri;
	private $datePubli;
	private $image;
	private $url;
	private $rss_id;
	
	function getTitre()
	{
		return $this->titre;
	}
	function getDescri()
	{
		return $this->descri;
	}
	function getDateP()
	{
		return $this->datePubli;
	}
	
	function getImage()
	{
		return $this->image;
	}
	function getURL()
	{
		return $this->url;
	}
	function getID()
	{
		return $rss_id;
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