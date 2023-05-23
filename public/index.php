<?php

declare(strict_types=1);

use Html\AppWebPage;
use Entity\Collection\ArtistCollection;

$webPage= new AppWebPage('Artistes');
$webPage->appendContent(
    <<<HTML
        <ul class="list">
HTML
);

$artistCollection=ArtistCollection::findAll();
foreach($artistCollection as $artist) {
    $webPage->appendContent(
        <<<HTML
        <li><a href="artist.php?artistId={$artist->getId()}">{$webPage->escapeString($artist->getName())}</a></li>
HTML
    );
}
$webPage->appendContent(
    <<<HTML
    </ul>
HTML
);
echo $webPage->toHTML();
