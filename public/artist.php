<?php

declare(strict_types=1);
use Entity\Artist;
use Entity\Exception\EntityNotFoundException;
use Html\WebPage;

try {
    if (!isset($_GET["artistId"]) || !ctype_digit($_GET["artistId"])) {
        header("Location: /", true, 302);
        exit();
    }
    $artistId=(int)$_GET["artistId"];
    $artist = Artist::findById($artistId);

    $webPage= new WebPage($artist->getName());



    $albums=$artist->getAlbums();

    $webPage->appendContent('<div><ul>');
    foreach ($albums as $album) {
        $year=$webPage->escapeString("{$album->getYear()}");
        $name=$webPage->escapeString($album->getName());
        $webPage->appendContent(
            <<<HTML
    <li>{$year} {$name}</li>
HTML
        );
    }
    $webPage->appendContent('</ul></div>');

    echo $webPage->toHTML();

} catch (EntityNotFoundException $e) {
    http_response_code(404);
    exit();
}
