<?php

# File created by Axel Coudrot
# Created with PhpStorm by JetBrains Studios
# License for JetBrains : student Noncommercial

declare(strict_types=1);

namespace Html;

trait StringEscaper
{
    public function escapeString(?string $string): string
    {
        return htmlspecialchars($string, ENT_QUOTES | ENT_IGNORE | ENT_HTML5);
    }
    public function stripTagsAndTrim(?string $text): string
    {
        if($text===null) {
            $text="";
        } else {
            $text = trim(strip_tags($text));
        }
        return $text;

    }

    /**
     * Méthode Statique renvoyant la date de dernière modification du script principale
     * @return string
     */
}
