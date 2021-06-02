<?php
include_once '../../../autoloader.php';
include_once '../../../assets/php/partials/navbar.php';

use leden\tekst\TekstController;
$tekstController = new TekstController();

if (isset($_GET['tekstID'])) {    
    $tekstObj = $tekstController->getTekst($_GET['tekstID']);
}

if (isset($_GET['method'])) {
    $tekstObj = $tekstController->getTekstWithMethod($_GET['method']);
}

$woorden = $tekstController->getWoordenFromTekst($tekstObj['TekstID'])


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="noindex">
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
            <label class="col-2">Aantal Karakters: (<?= $tekstObj['aantalKarakters'] ?>)</span></label>
            <label class="col-2">Aantal Leestekens: (<?= $tekstObj['aantalTekens'] ?>)</span></label>
            <label class="col-2">Aantal Zinnen: (<?= $tekstObj['aantalZinnen'] ?>)</span></label>
            <label class="col-2">Aantal Hoofdletters: (<?= $tekstObj['aantalHoofdLetters'] ?>)</span></label>
            <label class="col-2">Aantal Kleineletters: (<?= $tekstObj['aantalKleineLetters'] ?>)</span></label>
            <label class="col-2">Aantal Klinkers: (<?= $tekstObj['aantalKlinkers'] ?>)</span></label>
            <label class="col-2">Aantal Medeklinkers: (<?= $tekstObj['aantalMedeklinkers'] ?>)</span></label>
        </div>
        <table class="table mt-5">
            <thead>
                <tr>
                    <th>Woord</th>
                    <th>Totaal aantal keren voorgekomen</th>
                    <th>Aantal keren voorgekomen in de tekst</th>
                    <th>Aantal klinkers</th>
                    <th>Aantal medeklinkers</th>
                </tr>
            </thead>
            <?php 

                foreach ($woorden as $woord) {
                    echo "<tr><td>" . $woord['woord'] . "</td> <td>" . $woord['aantalInTeksten'] . "</td> <td>" . $woord['aantalInstancesPetTekst'] . "</td> <td>" .  $woord['aantalKlinkers'] ."</td> <td>" . $woord['aantalMedeklinkers'] . "</td></tr>";
                }
            
            ?>
        </table>
    </div>
</body>
</html>