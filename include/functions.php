<?php
function connexion() {
	// on se connecte Ã  MySQL
	$db = mysql_connect('db526408217.db.1and1.com', 'dbo526408217', '4612saad86') or die("Erreur de connexion au serveur.");
	// on sélectionne la base
	mysql_select_db('db526408217',$db) or die("Erreur de connexion à la base");
	return $db;
}
function deconnexion() {
	// on ferme la connexion Ã  mysql
	mysql_close();
}
function getImages($where=null,$or=null,$else=null) {
	$db = connexion();
	$sqlWhere = '';
	if (is_array($where)) {
		$sqlWhere = " where (" . implode( ' and ', $where).")";
	}
	$sqlOr = '';
	if (is_array($or)) {
		$sqlOr = " OR (" . implode( ' and ', $or).")";
	}
	$sqlElse = '';
	if (is_array($else)) {
		$sqlElse = " OR (" . implode( ' and ', $else).")";
	}
	$sql = "SELECT * FROM images $sqlWhere $sqlOr $sqlElse ";

	$result = mysql_query($sql);
	if (mysql_num_rows($result)) {
		while ($r[] = mysql_fetch_array($result, MYSQL_ASSOC));
	}
	$r[sizeof($r)-1] = null;
	unset($r[sizeof($r)-1]);
	deconnexion($db);
	return $r;
}
function debug($var)
{
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
}

function detection_mobile ()
{
/*	if (isset($_SERVER['HTTP_X_WAP_PROFILE']) || isset($_SERVER['HTTP_PROFILE']))
		return true;

	if (isset ($_SERVER['HTTP_ACCEPT']))
	{
		$accept = strtolower($_SERVER['HTTP_ACCEPT']);
		if (strpos($accept, 'wap') !== false)
			return true;
	}*/
	if (isset ($_SERVER['HTTP_USER_AGENT']))
	{
		if (strpos ($_SERVER['HTTP_USER_AGENT'], 'iPhone') !== false)
			return true;
		/*if (strpos ($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false)
			return true;

		if (strpos ($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false)
			return true;*/
	}

	return false;
}