<?php

declare(strict_types=1);

namespace Entity;

use Database\MyPdo;
use Entity\Collection\AlbumCollection;
use Entity\Exception\EntityNotFoundException;
use PDO;

class Artist
{
    private ?int $id;
    private string $name;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Artist
     */
    private function setId(?int $id): Artist
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Artist
     */
    public function setName(string $name): Artist
    {
        $this->name = $name;
        return $this;
    }

    public function delete()
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<SQL
    DELETE
    FROM artist
    WHERE id=:id
SQL
        );
        $stmt->execute([':id' => $this->id]);
        $this->id=null;
        return $this;
    }

    /**
     * @throws EntityNotFoundException
     */
    public static function findById(int $id): Artist
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

    public function update(): self
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<SQL
    UPDATE artist
    SET name=:name
    WHERE id=:id
SQL
        );
        $stmt->execute([':id' => $this->id, ':name' => $this->name]);
        return $this;
    }
    public function insert(): self
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<SQL
    INSERT INTO artist (name)
    VALUES (:name)
SQL
        );
        $stmt->execute([':name' => $this->name]);
        $this->setId((int)MyPdo::getInstance()->lastInsertId());
        return $this;
    }
    public function save(): void
    {
        if($this->id === null) {
            $this->insert();
        } else {
            $this->update();
        }
    }
    public static function create(string $name, ?int $id=null): Artist
    {
        $artist=new Artist();
        $artist->setId($id);
        $artist->setName($name);
        return $artist;
    }
    private function __construct()
    {

    }
}
