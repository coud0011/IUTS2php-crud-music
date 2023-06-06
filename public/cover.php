<?php

# File created by Axel Coudrot
# Created with PhpStorm by JetBrains Studios
# License for JetBrains : student Noncommercial

declare(strict_types=1);

use Entity\Cover;
use Entity\Exception\EntityNotFoundException;
use Exception\ParameterException;

try {
    if (!isset($_GET["coverId"]) || !ctype_digit($_GET["coverId"])) {
        throw new ParameterException("Pas de demande de couverture dans cover.php!");
    }
    $coverId=(int)$_GET["coverId"];
    $cover=Cover::findById($coverId);
    header('Content-Type: image/jpeg');
    echo $cover->getJpeg();



} catch (ParameterException) {
    http_response_code(400);
} catch (EntityNotFoundException) {
    http_response_code(404);
} catch (Exception) {
    http_response_code(500);
}
