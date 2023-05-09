<?php

declare(strict_types=1);

namespace Entity\Collection;

use Database\MyPdo;
use Entity\Artist;
use PDO;

class ArtistCollection
{
    /**
     * Méthode d'instance findAll
     * Permet de récupérer dans un array
     * tous les artistes de la class artiste
     * de notre base de donnée
     * @return Artist[]
     */
    public static function findAll(): array
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<'SQL'
    SELECT id, name
    FROM artist
    ORDER BY name
SQL
        );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Artist::class);
        return $stmt->fetchAll();

    }
}
