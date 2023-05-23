<?php

declare(strict_types=1);

namespace Entity;

use Database\MyPdo;
use Entity\Collection\AlbumCollection;
use Entity\Exception\EntityNotFoundException;
use PDO;

class Artist
{
    private int $id;
    private string $name;

    /**
     * Accesseur de l'id de l'artiste
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Accesseur du nom de l'artiste
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public static function findById(int $id): Artist // throw EntityNotFoundException
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<SQL
    SELECT id, name
    FROM artist
    WHERE id=:id
    ORDER BY name
SQL
        );
        $stmt->execute([':id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Artist::class);
        $artist=$stmt->fetch();
        if (!$artist) {
            throw new EntityNotFoundException("Pas d'artiste avec l'id : $id dans la table artist de la base de donnée");
        }
        return $artist;
    }

    /**
     * @return Album[]
     */
    public function getAlbums(): array
    {
        return AlbumCollection::findByArtistId($this->id);
    }
}
