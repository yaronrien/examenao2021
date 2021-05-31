<?php
    include_once '../assets/php/partials/navbar.php';
    require_once '../assets/php/partials/config.php';

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        $sql = 'SELECT * FROM teksten ORDER BY aantalTekens DESC, toevoegDatum DESC LIMIT 1';
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        die("Could not connect to the database $dbname :" . $e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Langste</title>
</head>
<body>
    <div class=" mt-5 container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h1 text-center mb-3">Uw Langste Tekst</h1>
            </div>
            <?php while ($row = $q->fetch()): ?>
            <label readonly class="form-control"><b><?php echo htmlspecialchars($row['tekstTitel']); ?></b></label>
            <textarea readonly class="form-control rounded-0" rows="10" ><?php echo htmlspecialchars($row['tekst']); ?></textarea>
            <div class="row">
                <label class="col-2">Aantal Tekens: (<?php echo htmlspecialchars($row['aantalTekens']); ?>)</span></label>
                <label class="col-2">Aantal Zinnen: (<?php echo htmlspecialchars($row['aantalZinnen']); ?>)</span></label>
                <label class="col-2">Aantal Hoofdletters: (<?php echo htmlspecialchars($row['aantalHoofdLetters']); ?>)</span></label>
                <label class="col-2">Aantal Kleineletters: (<?php echo htmlspecialchars($row['aantalKleineLetters']); ?>)</span></label>
                <label class="col-2">Aantal Klinkers: (<?php echo htmlspecialchars($row['aantalKlinkers']); ?>)</span></label>
                <label class="col-2">Aantal Medeklinkers: (<?php echo htmlspecialchars($row['aantalMedeklinkers']); ?>)</span></label>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>