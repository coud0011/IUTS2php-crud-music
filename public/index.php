<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

$html= <<<HTML
<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="UTF-8">
    <title>Application de consultation et de modification d'une base de donnée de musique</title>
  </head>
  <body>
    <h1>Hello Music!</h1>

HTML;


use Database\MyPdo;

MyPDO::setConfiguration('mysql:host=mysql;dbname=cutron01_music;charset=utf8', 'web', 'web');

$stmt = MyPDO::getInstance()->prepare(
    <<<'SQL'
    SELECT id, name
    FROM artist
    ORDER BY name
SQL
);

$stmt->execute();
$html.="    <table>\n      <tr><th>Nom de l'artiste</th></tr>\n";
while (($ligne = $stmt->fetch()) !== false) {
    $html.="      <tr><td>{$ligne['name']}</tr></td>\n";
}
$html.="    </table>\n  </body>\n</html>";
echo $html;
