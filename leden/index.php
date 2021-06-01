<?php
include_once '../autoloader.php';

use leden\LedenController;

$ledenController = new LedenController();

$mostUsedWords = $ledenController->getMostUsedWords();
$mostLeastWords = $ledenController->getLeastUsedWords();
$mostUsedLetter = $ledenController->getMostUsedLetters();
$leastUsedLetter = $ledenController->getLeastUsedLetters();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Leden Dashboard</title>
</head>
<body>
    <?php include_once '../assets/php/partials/navbar.php' ?>
    <div class="container d-flex flex-column align-items-center">
        <h1 class="mt-5">Leden dashboard</h1>

        <div class="d-flex justify-content-between w-75 mt-5">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                <a href="http://localhost/examenao2021/leden/tekst/analyse/?method=recent"><h5 class="card-title">Recente tekst</h5></a>
                </div>
            </div>
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                <a href="http://localhost/examenao2021/leden/tekst/analyse/?method=longest"><h5 class="card-title">Langste tekst</h5></a>
                </div>
            </div>
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                <a href="http://localhost/examenao2021/leden/tekst/analyse/?method=shortest"><h5 class="card-title">kortste tekst</h5></a>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between w-100 mt-5">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <p class="card-text">Meest gebruikte letters</p>
                    <ol>
                        <?php
                            foreach ($mostUsedLetter as $letter) {
                                echo '<li>' . $letter['teken'] . '</li>';
                            }
                        ?>
                    </ol>
                </div>
            </div>
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <p class="card-text">Minst gebruikte letters</p>
                    <ol>
                        <?php
                            foreach ($leastUsedLetter as $letter) {
                                echo '<li>' . $letter['teken'] . '</li>';
                            }
                        ?>
                    </ol>
                </div>
            </div>
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <p class="card-text">Meest gebruikte woorden</p>
                    <ol>
                        <?php
                            foreach ($mostUsedWords as $word) {
                                echo '<li>' . $word['woord'] . '</li>';
                            }
                        ?>
                    </ol>
                </div>
            </div>
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <p class="card-text">Minst gebruikte letters</p>
                    <ol>
                        <?php
                            foreach ($mostLeastWords as $word) {
                                echo '<li>' . $word['woord'] . '</li>';
                            }
                        ?>
                    </ol>
                </div>
            </div>
        </div>
        
        <div class="d-flex justify-content-between w-50 mt-5">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <a href="http://localhost/examenao2021/leden/tekst/alle"><h5 class="card-title">Alle teksten zien</h5></a>
                </div>
            </div>
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <a href="http://localhost/examenao2021/leden/tekst/"><h5 class="card-title">Tekst versturen</h5></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
