<?php

# File created by Axel Coudrot
# Created with PhpStorm by JetBrains Studios
# License for JetBrains : student Noncommercial

declare(strict_types=1);

namespace Entity;

class Album
{
    /**
     * La classe Album permet de recevoir les albums de notre base de donnée de musique
     *
     * Voici ses attributs d'instance :
     * @var int id identifiant de l'album
     * @var string name nom de l'album
     * @var int year année de l'album
     * @var int artistId identifiant de l'artiste qui a fait l'album
     * @var int genreId identifiant du genre de l'album
     * @var int coverId identifiant de la couverture de l'album
     */
    private int $id;
    private string $name;
    private int $year;
    private int $artistId;
    private int $genreId;
    private int $coverId;

    /**
     * Accesseur de l'identifiant de l'album
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Accesseur du nom de l'album
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Accesseur de l'année de l'album
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * Accesseur de l'identifiant de l'artiste qui a fait l'album
     * @return int
     */
    public function getArtistId(): int
    {
        return $this->artistId;
    }

    /**
     * Accesseur de l'identifiant du genre de l'album
     * @return int
     */
    public function getGenreId(): int
    {
        return $this->genreId;
    }

    /**
     * Accesseur de l'identifiant de la couverture de l'album
     * @return int
     */
    public function getCoverId(): int
    {
        return $this->coverId;
    }


}
