<?php
include_once '../../../autoloader.php';

use leden\tekst\TekstController;

$tekstController = new TekstController();

$alleTeksten = $tekstController->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Alle teksten</title>
</head>
<body>
    <div class=" mt-5 container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h1 text-center mb-3">Alle teksten</h1>
            </div>
            <?php
                foreach ($alleTeksten as $tekst) {
                    echo '<label readonly class="form-control"><a href="http://localhost/examenao2021/leden/tekst/analyse/?tekstID=' . $tekst['TekstID'] . '"><b>' . $tekst['tekstTitel'] . '</b></a></label>
                            <div class="row">
                            <br>

                            </div>';
                }
            ?>
        </div>
    </div>
</body> 