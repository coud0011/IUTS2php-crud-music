<?php

declare(strict_types=1);
use Database\MyPdo;
use Html\WebPage;

$webPage= new WebPage("Application de consultation et de modification d'une base de donnée de musique");
$webPage->appendContent("<h1>Hello Music!</h1>");

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
    $id=$webPage->escapeString("{$ligne['id']}");
    $webPage->appendContent(
        <<<HTML
      <td>
        <td><a href="artist.php?artistId=$id">{$webPage->escapeString($ligne['name'])}</a></td>
      </tr>
HTML
    );
}
$webPage->appendContent("    </table>\n  </body>\n</html>");
echo $webPage->toHTML();
