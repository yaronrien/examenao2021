<?php
include_once '../../autoloader.php';
include_once '../../assets/php/partials/navbar.php';

use leden\woord\WoordController;

$woordController = new WoordController();

$wordDetails = $woordController->getWordDetails();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woord | <?= $wordDetails[0]['woord'] ?></title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>
    <div class="d-flex flex-column align-items-center w-100 text-center">
        <h1 class="mt-5">Het woord: <?= $wordDetails[0]['woord'] ?></h1>
        <p class="fw-bold mt-5">Dit woord komt in totaal <?= $wordDetails[0]['aantalInTeksten'] ?> keer voor in teksten en heeft <?= $wordDetails[0]['aantalKlinkers'] ?> klinkers en <?= $wordDetails[0]['aantalMedeklinkers'] ?> medeklinkers</p>
        <div class="card mt-5" style="width: 18rem;">
            <div class="card-body">
                <p class="fw-bold card-text">Teksten waar dit woord in voor komt</p>
                <ul class="list-group">
                    <?php
                        foreach ($wordDetails as $value) {
                            echo '<a href="http://localhost/examenao2021/leden/tekst/analyse/?tekstID='. $value['tekstID'] .'"><li class="list-group-item fw-bold">'. $value['tekstTitel'] .'</li></a>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
