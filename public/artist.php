<?php

declare(strict_types=1);
use Database\MyPdo;
use Html\WebPage;

if (!isset($_GET["artistId"]) || !ctype_digit($_GET["artistId"])) {
    header("Location: /", true, 302);
    exit();
}
$artistId=$_GET["artistId"];
$firstRequest= MyPdo::getInstance()->prepare(
    <<<SQL
SELECT name
FROM artist
WHERE id=:artistId
SQL
);
$firstRequest->execute([':artistId' => $artistId]);
$webPage= new WebPage($firstRequest->fetch()['name']);



$secondRequest= MyPdo::getInstance()->prepare(
    <<<SQL
SELECT *
FROM album
WHERE artistId=:artistId
ORDER BY year desc, name
SQL
);
$secondRequest->execute([':artistId' => $artistId]);

$webPage->appendContent('<div><ul>');
while (($ligne = $secondRequest->fetch())!= false) {
    $year=$webPage->escapeString("{$ligne['year']}");
    $name=$webPage->escapeString("{$ligne['name']}");
    $webPage->appendContent(
        <<<HTML
    <li>{$year} {$name}</li>
HTML
    );
}
$webPage->appendContent('</ul></div>');

echo $webPage->toHTML();
