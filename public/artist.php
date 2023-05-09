<?php

declare(strict_types=1);
use Database\MyPdo;
use Html\WebPage;

if (!isset($_GET["artistId"]) || !ctype_digit($_GET["artistId"])) {
    header("Location: /", true, 302);
    exit();
}
$artistId=$_GET["artistId"];
$artistRequest= MyPdo::getInstance()->prepare(
    <<<SQL
SELECT name
FROM artist
WHERE id=:artistId
SQL
);
$artistRequest->execute([':artistId' => $artistId]);
$ligne=$artistRequest->fetch();
if (!isset($ligne['name'])) {
    http_response_code(404);
    exit();
}
$webPage= new WebPage($ligne['name']);



$albumRequest= MyPdo::getInstance()->prepare(
    <<<SQL
SELECT *
FROM album
WHERE artistId=:artistId
ORDER BY year desc, name
SQL
);
$albumRequest->execute([':artistId' => $artistId]);

$webPage->appendContent('<div><ul>');
while (($ligne = $albumRequest->fetch())!= false) {
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
