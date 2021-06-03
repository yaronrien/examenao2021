<?php
include_once '../../autoloader.php';
include_once '../../assets/php/partials/navbar.php';

use leden\woord\WoordController;

$woordController = new WoordController();

$wordDetails = $woordController->getWords();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle Woorden</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="d-flex flex-column align-items-center w-75 mx-auto text-center">
        <h1 class="mt-5">Uw Geschreven Woorden</h1>
        <div class="row row-cols-3 row-cols-md-3 g-4">
            <?php
                foreach ($wordDetails as $value) {
                echo '<div class="col">
                    <div class="card m-5">
                        <div class="card-body">
                            <ul class="list-group">   
                                <p class="fw-bold card-text"><a class="text-decoration-none link-info text-capitalize" href="http://localhost/examenao2021/leden/woord/?woordID=' .  $value['woordID'] . '">' .  $value['woord'] . '</a></p>
                                <p>Teksten:' . $value['aantalInTeksten'] . '</p>
                                <p>Klinkers:' . $value['aantalKlinkers'] . '</p>
                                <p>Medeklinkers:' . $value['aantalMedeklinkers'] . '</p>
                            </ul>
                        </div>
                    </div>
                </div>';

                }
            ?>
        </div>
    </div>
</body>
</html>

