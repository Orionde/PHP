<?php
    
    require_once("Categorie.class.php");
    require_once("Article.class.php");
    
    // Definition de l'unique objet de DAO
    $dao = new DAO();
    
    // Le Data Access Object
    // Il représente la base de donnée
    class DAO {
        private $db;
        private $database = 'sqlite:../data/db/bricomachin.db';
        function __construct() {
			try
			{
				$this->db = new PDO($this->database);
			}
			catch (PDOException $e)
			{
				die("erreur de connexion:".$e->getMessage()); 
			}

        }
        // Accès à toutes les catégories
        // Retourne une table d'objets de type Categorie
        function getAllCat()
		{
			$sql = "SELECT * FROM categorie";
			$sth = $this->db->query($sql);
			$result = $sth->fetchAll(PDO::FETCH_CLASS,"Categorie");
			return $result;
			
        }
        
        
        
        // Accès aux n premiers articles
        // Cette méthode retourne un tableau contenant les n permier articles de
        // la base sous la forme d'objets de la classe Article.
        function firstN($n) {

            
           
            
        }
        
        // Acces au n articles à partir de la reférence $ref
        // Cette méthode retourne un tableau contenant n  articles de
        // la base sous la forme d'objets de la classe Article.
        function getN($ref,$n) {

           
            
        }
        
        // Acces à l'article suivant l'article dans l'ordre des références
        // Cette méthode ne rend qu'un objet de la classe Article
        function next(Article $a) {

            
        }
        
        // Acces aux n articles qui précèdent de $size l'article $a dans l'ordre des références
        function prevN(Article $a,$n) {

            
        }
        
        
        
        // Acces à une catégorie
        // Retourne un objet de la classe Categorie connaissant son identifiant
        function getCat($id) {
            
        }
        
        
        
        
        // Acces au n articles à partir de la reférence $ref de la catégorie indiquée
        // Retourne une table d'objets de la classe Article
        function getNCateg($ref,$n,$categorie) {

            
        }
        
    }
    
    ?>
