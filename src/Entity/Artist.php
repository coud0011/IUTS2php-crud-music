<?php

declare(strict_types=1);

namespace Entity;

class Artist
{
    private int $id;
    private string $name;

    /**
     * Accesseur de l'Id de l'artiste
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


}
