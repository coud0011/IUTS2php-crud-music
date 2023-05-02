<?php

declare(strict_types=1);
use Database\MyPdo;
use Html\WebPage;

require_once '../vendor/autoload.php';
$webPage= new WebPage("Application de consultation et de modification d'une base de donnée de musique");

$webPage->appendContent("<h1>Hello Music!</h1>");





MyPDO::setConfiguration('mysql:host=mysql;dbname=cutron01_music;charset=utf8', 'web', 'web');

$stmt = MyPDO::getInstance()->prepare(
    <<<'SQL'
    SELECT id, name
    FROM artist
    ORDER BY name
SQL
);

$stmt->execute();
$webPage->appendContent("\n    <table>\n      <tr><th>Nom de l'artiste</th></tr>\n");
while (($ligne = $stmt->fetch()) !== false) {
    $webPage->appendContent("      <tr><td>{$webPage->escapeString($ligne['name'])}</tr></td>\n");
}
$webPage->appendContent("    </table>\n  </body>\n</html>");
echo $webPage->toHTML();
