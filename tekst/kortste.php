<?php
    include_once '../assets/php/partials/navbar.php';
    require_once '../assets/php/partials/config.php';

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        $sql = 'SELECT * FROM teksten ORDER BY aantalTekens ASC, toevoegDatum DESC LIMIT 1';
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
    <title>Kortste</title>
</head>
<body>
    <div class=" mt-5 container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h1 text-center mb-3">Uw Kortste Tekst</h1>
            </div>
            <?php while ($row = $q->fetch()): ?>
            <textarea readonly class="form-control rounded-0" rows="10" ><?php echo htmlspecialchars($row['tekst']); ?></textarea>
            <div class="d-flex justify-content-center">
                <label class="p-2 align-self-stretch">Aantal Tekens: (<?php echo htmlspecialchars($row['aantalTekens']); ?>)</span></label>
                <label class="p-2 align-self-stretch">Aantal Zinnen: (<?php echo htmlspecialchars($row['aantalZinnen']); ?>)</span></label>
                <label class="p-2 align-self-stretch">Aantal Hoofdletters: (<?php echo htmlspecialchars($row['aantalHoofdLetters']); ?>)</span></label>
                <label class="p-2 align-self-stretch">Aantal Kleineletters: (<?php echo htmlspecialchars($row['aantalKleineLetters']); ?>)</span></label>
                <label class="p-2 align-self-stretch">Aantal Klinkers: (<?php echo htmlspecialchars($row['aantalKlinkers']); ?>)</span></label>
                <label class="p-2 align-self-stretch">Aantal Medeklinkers: (<?php echo htmlspecialchars($row['aantalMedeklinkers']); ?>)</span></label>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>