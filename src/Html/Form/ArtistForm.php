<?php

# File created by Axel Coudrot
# Created with PhpStorm by JetBrains Studios
# License for JetBrains : student Noncommercial

declare(strict_types=1);

namespace Html\Form;

use Entity\Artist;
use Exception\ParameterException;
use Html\StringEscaper;

class ArtistForm
{
    use StringEscaper;

    private ?Artist $artist;

    public function __construct(?Artist $artist=null)
    {
        $this->artist = $artist;
    }

    public function getArtist(): ?Artist
    {
        return $this->artist;
    }
    public function getHtmlForm(string $action): string
    {
        return <<<HTML
    <form action="$action" method="post">
        <input name="id" type="hidden" value="">
        <label>Nom
            <input name="name" type="text" value="{$this->escapeString("{$this?->artist?->getName()}")}" required>
        </label>
      
        <input name="Enregistrer" type="submit">
    </form>
HTML;
    }
    public function setEntityFromQueryString(): void
    {
        $id = $_POST["id"] ?? null;
        if(isset($_POST["name"])) {
            $name=$_POST["name"];
        } else {
            throw new ParameterException("ArtistForm : setEntityFromQueryString : name absent");
        }
        $this->artist=Artist::create($this->stripTagsAndTrim($name), $id);
    }

}
