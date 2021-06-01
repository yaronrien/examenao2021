<?php
include_once '../../../autoloader.php';
include_once '../../../assets/php/partials/navbar.php';

use leden\tekst\TekstController;

if (isset($_GET['tekstID'])) {
    $tekstController = new TekstController();
    
    $tekstObj = $tekstController->getTekst($_GET['tekstID']);

    // die(var_dump($tekstObj));
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tekst analyse</title>
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>
    <div class="container mt-4">
        <label readonly class="form-control"><b><?= $tekstObj['tekstTitel'] ?></b></label>
        <textarea readonly class="form-control rounded-0 mt-3" rows="10" ><?= $tekstObj['tekst'] ?></textarea>
        <div class="row">
            <label class="col-2">Aantal Tekens: (<?= $tekstObj['aantalTekens'] ?>)</span></label>
            <label class="col-2">Aantal Zinnen: (<?= $tekstObj['aantalZinnen'] ?>)</span></label>
            <label class="col-2">Aantal Hoofdletters: (<?= $tekstObj['aantalHoofdLetters'] ?>)</span></label>
            <label class="col-2">Aantal Kleineletters: (<?= $tekstObj['aantalKleineLetters'] ?>)</span></label>
            <label class="col-2">Aantal Klinkers: (<?= $tekstObj['aantalKlinkers'] ?>)</span></label>
            <label class="col-2">Aantal Medeklinkers: (<?= $tekstObj['aantalMedeklinkers'] ?>)</span></label>
        </div>
    </div>
</body>
</html>