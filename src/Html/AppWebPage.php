<?php

# File created by Axel Coudrot
# Created with PhpStorm by JetBrains Studios
# License for JetBrains : student Noncommercial

declare(strict_types=1);

namespace Html;

class AppWebPage extends WebPage
{
    public function __construct(String $title="")
    {
        parent::__construct($title);
        $this->appendCssUrl("/css/style.css");
    }

    public function toHTML(): string
    {
        $date=WebPage::getLastModification();
        $css= <<<CSS
        footer{
                        display:flex;
                        font-style: italic;
                        font-size: small;
                    }
        CSS;
        $html= <<<HTML
        <!DOCTYPE html>
        <html lang="fr">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1" />$this->head
                <style>
                    $css
                </style>
            <title>$this->title</title>
            </head>
            <body>
                <header class="header"><h1>$this->title</h1></header>
                $this->body
                <footer class="footer">
                    Dernière modification : $date
                </footer>
            </body>
        </html>
        HTML;
        return $html;
    }
}
