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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uw Woorden</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>
    <div class="d-flex flex-column align-items-center w-100 text-center">
        <h1 class="mt-5">Uw Geschreven Woorden</h1>
        <div class="row">
            <?php
                foreach ($wordDetails as $value) {
                echo '<div class="col-sm-6">
                    <div class="card mt-5" style="width: 18rem;">
                        <div class="card-body">
                            <ul class="list-group">   
                                <p class="fw-bold card-text"><a href="http://localhost/examenao2021/leden/woord/?woordID=' .  $value['woordID'] . '">' .  $value['woord'] . '</a></p>
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

