<?php 
header("Cache-Control: max-age=1");
// on se connecte à MySQL 
	$db = mysql_connect('db526408217.db.1and1.com', 'dbo526408217', '4612saad86') or die("Erreur de connexion au serveur."); 
	// on sélectionne la base 
	mysql_select_db('db526408217',$db) or die("Erreur de connexion à la base");


$dir_nom = 'images/big/rooms/'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
$fichier= array(); // on déclare le tableau contenant le nom des fichiers
$dossier= array(); // on déclare le tableau contenant le nom des dossiers

while($element = readdir($dir)) {
	if($element != '.' && $element != '..') {
		if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
		else {$dossier[] = $element;}
	}
}

closedir($dir);

foreach ($fichier as $value) {
	// on crée la requête SQL 
	$sql = "INSERT INTO  kech.images (dossier ,nom ) VALUES ( 'images/big/rooms/',  '$value' ); ";
// on envoie la requête 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.mysql_error()); 
}

echo "tous c'est bien passer last insert id = ".mysql_insert_id();

/*
// on fait une boucle qui va faire un tour pour chaque enregistrement 
while($data = mysql_fetch_assoc($req)) 
    { 
    // on affiche les informations de l'enregistrement en cours 
    echo '<b>'.$data['nom'].' '.$data['prenom'].'</b> ('.$data['statut'].')'; 
    echo ' <i>date de naissance : '.$data['date'].'</i><br>'; 
    } 
*/

// on ferme la connexion à mysql 
mysql_close(); 
?> 