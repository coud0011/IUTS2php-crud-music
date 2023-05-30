<?php

declare(strict_types=1);
use Entity\Artist;
use Entity\Exception\EntityNotFoundException;
use Html\AppWebPage;

try {
    if (!isset($_GET["artistId"]) || !ctype_digit($_GET["artistId"])) {
        header("Location: index.php", true, 302);
        exit();
    }
    $artistId=(int)$_GET["artistId"];
    $artist = Artist::findById($artistId);

    $webPage= new AppWebPage();
    $webPage->setTitle("Albums de {$webPage->escapeString($artist->getName())}");

    $albums=$artist->getAlbums();

    $webPage->appendContent('<ul class="list">');
    foreach ($albums as $album) {
        $webPage->appendContent(
            <<<HTML
    <li class="album">
        <span class="album__year">{$album->getYear()}</span>
        <span class="album__name">{$webPage->escapeString($album->getName())}</span>
    </li>
HTML
        );
    }
    $webPage->appendContent('</ul>');

    echo $webPage->toHTML();

} catch (EntityNotFoundException $e) {
    http_response_code(404);
    exit();
}
