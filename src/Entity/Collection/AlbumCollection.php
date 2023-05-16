<?php

# File created by Axel Coudrot
# Created with PhpStorm by JetBrains Studios
# License for JetBrains : student Noncommercial

declare(strict_types=1);

namespace Entity\Collection;

use Database\MyPdo;
use Entity\Album;
use PDO;

class AlbumCollection
{
    /**
     * Méthode d'instance findAll
     * Permet de récupérer dans un array
     * tous les artistes de la class artiste
     * de notre base de donnée
     * @return Album[]
     */
    public static function findAll(): array
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<SQL
    SELECT id, name, year, artistId, genreId, coverId
    FROM album
    ORDER BY year desc, name
SQL
        );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Album::class);
        return $stmt->fetchAll();
    }
}
