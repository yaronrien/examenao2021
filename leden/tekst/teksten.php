<?php

    include_once '../assets/php/partials/navbar.php';
    require '../assets/php/partials/config.php';
    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        $sql = 'SELECT tekstTitel, tekst FROM teksten ORDER BY toevoegDatum DESC'; 
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        die("Oh nee.. en nu? $dbname :" . $e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Alle teksten</title>
</head>
<body>
    <div class=" mt-5 container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h1 text-center mb-3">Alle teksten</h1>
            </div>
            <?php while ($row = $q->fetch()): ?>
            <label readonly class="form-control"><b><?php echo htmlspecialchars($row['tekstTitel']); ?></b></label>
            <textarea readonly class="form-control rounded-0" rows="10" ><?php echo htmlspecialchars($row['tekst']); ?></textarea>
            <div class="row">
               <br>

            </div>
            <?php endwhile; ?>
        </div>
    </div>
</body> 