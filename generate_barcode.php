<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php';

use Picqer\Barcode\BarcodeGeneratorHTML;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    // Połącz oba ciągi znaków
    $combinedString = '(95)'.$login.'(96)'.$password.'(97)iows';
    //echo $combinedString;
    
    // Generowanie kodu kreskowego 128
    $generator = new BarcodeGeneratorHTML();
    
    $textColor = [0, 0, 0];
    $bgColor = [255, 255, 255];
    
    $barcode = $generator->getBarcode(
        $combinedString,
        $generator::TYPE_CODE_128,
        2,
        200,
    );
    
    // Wyświetlenie kodu kreskowego
    //header('Content-Type: image/png');
    //echo $barcode;

     // Wyświetlenie kodu kreskowego
     echo '<!DOCTYPE html>';
     echo '<html lang="pl">';
     echo '<head>';
     echo '<meta charset="UTF-8">';
     echo '<title>Generowanie kodu kreskowego GS1-128</title>';
     echo '<style>';
     echo 'body { background-color: white; }';
     echo '.barcode { background-color: white; padding: 20px; }';
     echo '</style>';
     echo '</head>';
     echo '<body>';
     echo '<div class="barcode">' . $barcode . '</div>';
     //echo $combinedString;
     echo '<a href="index.html" class="btn btn-danger btn-lg">Powrót</a>';
     echo '</body>';
     echo '</html>';
    
} else {
    echo "Proszę wypełnić formularz.";
}
?>