<?php
    require '../assets/php/partials/config.php';
    try  {
        $connection = new PDO($dsn, $username, $password, $options);

        $sql = 'SELECT woorden.aantalInTeksten, woorden.aantalKlinkers, woorden.aantalMedeklinkers, teksten.tekstTitel FROM woorden
        LEFT JOIN tekstwoorden ON woorden.woordID = tekstwoorden.woordID
        LEFT JOIN teksten ON tekstwoorden.tekstID = teksten.tekstID WHERE woorden.woord = "' . $_GET['woord'] . '";';
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woord | <?= $_GET['woord'] ?></title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>
    <?php include_once '../assets/php/partials/navbar.php'  ?>
    <div class="d-flex flex-column align-items-center w-100 text-center">
        <h1 class="mt-5">Het woord: <?= $_GET['woord'] ?></h1>
        <p class="fw-bold mt-5">Dit woord komt in totaal <?= $result[0]['aantalInTeksten'] ?> keer voor in teksten en heeft <?= $result[0]['aantalKlinkers'] ?> klinkers en <?= $result[0]['aantalMedeklinkers'] ?> medeklinkers</p>
        <div class="card mt-5" style="width: 18rem;">
            <div class="card-body">
                <p class="fw-bold card-text">Teksten waar dit woord in voor komt</p>
                <ul class="list-group">
                    <?php
                        foreach ($result as $value) {
                            echo '<li class="list-group-item fw-bold">'. $value['tekstTitel'] .'</li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>