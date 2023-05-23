<?php

declare(strict_types=1);

use Entity\Artist;
use Html\AppWebPage;
use Entity\Collection\ArtistCollection;

$webPage= new AppWebPage("Application de consultation et de modification d'une base de donnée de musique");
$webPage->appendContent(
    <<<HTML
        <div class="content">
        <h1>Hello Music!</h1>
        <ul class="list">
HTML
);

$artistCollection=ArtistCollection::findAll();
foreach($artistCollection as $artist) {
    $id=$webPage->escapeString("{$artist->getId()}");
    $name=$webPage->escapeString($artist->getName());
    $webPage->appendContent(
        <<<HTML
        <li><a href="artist.php?artistId=$id">$name</a></li>
HTML
    );
}
$webPage->appendContent(
    <<<HTML
    </ul></div>
HTML
);
echo $webPage->toHTML();
