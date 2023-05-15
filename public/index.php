<?php

declare(strict_types=1);

use Html\WebPage;
use Entity\Collection\ArtistCollection;

$webPage= new WebPage("Application de consultation et de modification d'une base de donnée de musique");
$webPage->appendContent(
    <<<HTML
        <h1>Hello Music!</h1>
        <ul>
HTML
);

$artistCollection=ArtistCollection::findAll();
foreach($artistCollection as $key=>$artist) {
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
    </ul>
HTML
);
echo $webPage->toHTML();
