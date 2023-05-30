<?php

# File created by Axel Coudrot
# Created with PhpStorm by JetBrains Studios
# License for JetBrains : student Noncommercial

declare(strict_types=1);

namespace Entity;

use Database\MyPdo;
use Entity\Exception\EntityNotFoundException;
use PDO;

class Cover
{
    private int $id;
    private string $jpeg;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getJpeg(): string
    {
        return $this->jpeg;
    }

    /**
     * Méthode de classe findById qui permet de trouver la pochette en fonction
     * retourne la pochette correspondant à l'id.
     * @param int $id
     * @return Cover
     */
    public static function findById(int $id): Cover
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<SQL
    SELECT id, jpeg
    FROM cover
    WHERE id=:id
SQL
        );
        $stmt->execute([':id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Cover::class);
        $cover=$stmt->fetch();
        if (!$cover) {
            throw new EntityNotFoundException("Pas de pochette avec l'id : $id dans la table cover de la base de donnée");
        }
        return $cover;
    }
}
