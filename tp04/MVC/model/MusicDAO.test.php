<?php
require_once('Music.class.php');
require_once('MusicDAO.class.php');

// Récupération des données de configuration
$config = parse_ini_file('../config/config.ini');

// Creation de l'instace DAO
$jukebox = new MusicDAO($config['database_path']);

$m = $jukebox->get(1);
var_dump($m);
?>
