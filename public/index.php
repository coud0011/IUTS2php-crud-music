<?php

declare(strict_types=1);
use Database\MyPdo;
use Html\WebPage;

$webPage= new WebPage("Application de consultation et de modification d'une base de donnée de musique");

$webPage->appendContent(<<<HTML
<h1>Hello Music!</h1>
<form>

</form>
<a href="artist.php">Page Artiste</a>
HTML);






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
