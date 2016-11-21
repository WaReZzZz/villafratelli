<?php

if (getenv('APPLICATION_ENV') === 'development') {
    define('APPLICATION_ENV', 'development');
} else {
    define('APPLICATION_ENV', 'production');
}

function connexion()
{
    try {
        if (APPLICATION_ENV === 'production') {
            // on se connecte à MySQL
            $db = new \PDO('mysql:host=db526408217.db.1and1.com;dbname=db526408217', 'dbo526408217', '4612saad86') or die("Erreur de connexion au serveur.");
        } else {
            $db = new \PDO('mysql:host=localhost;dbname=fratelli', 'root', 'jjZcWmZDQBT8Hfsn') or die("Erreur de connexion au serveur.");
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

function getImages($where = null, $or = null, $else = null)
{
    $db = connexion();
    $sqlWhere = '';
    if (is_array($where)) {
        $sqlWhere = " where (" . implode(' and ', $where) . ")";
    }
    $sqlOr = '';
    if (is_array($or)) {
        $sqlOr = " OR (" . implode(' and ', $or) . ")";
    }
    $sqlElse = '';
    if (is_array($else)) {
        $sqlElse = " OR (" . implode(' and ', $else) . ")";
    }
    $sql = "SELECT * FROM images $sqlWhere $sqlOr $sqlElse ";

    $result = $db->query($sql, \PDO::FETCH_ASSOC);
    if ($result->rowCount() > 0) {
        while ($r[] = $result->fetch());
    }
    $r[sizeof($r) - 1] = null;
    unset($r[sizeof($r) - 1]);
    return $r;
}

function debug($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function detection_mobile()
{
    /* 	if (isset($_SERVER['HTTP_X_WAP_PROFILE']) || isset($_SERVER['HTTP_PROFILE']))
      return true;

      if (isset ($_SERVER['HTTP_ACCEPT']))
      {
      $accept = strtolower($_SERVER['HTTP_ACCEPT']);
      if (strpos($accept, 'wap') !== false)
      return true;
      } */
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') !== false)
            return true;
        /* if (strpos ($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false)
          return true;

          if (strpos ($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false)
          return true; */
    }

    return false;
}
