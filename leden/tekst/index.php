<?php
    include_once '../../autoloader.php';
    include_once '../../assets/php/partials/navbar.php';
    use leden\tekst\TekstController;

    $data = $_POST;
    if(isset($_POST['submit'])){
        if(!(empty($data['tekstTitel']) || empty($data['tekst']))) {
            echo '<script>alert("Tekst is verstuurd!")</script>';
        }

        $tekstController = new TekstController();

        $tekstController->saveTekst();
    }
 
  ?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css">
</head>

<body>
    <form method="post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">

                        <div class="form-group mb-3">
                            <h1 class="h1 text-center mb-3">Tekst schrijven</h1>
                            <h4 class="h4 text-center mb-3">max 500 karakters</h4>
                            <input required class="form-control input-sm" name="tekstTitel" maxlength="80" type="text"
                                placeholder="Titel">
                        </div>
                        <textarea class="form-control rounded-0" name="tekst" required maxlength="500" rows="10"
                            onkeyup="countCharacters(this.value)" placeholder="Schrijf tekst"></textarea>
                        <label> Aantal Letters: <span id="characterCount">0</span>/500 </label><br />
                        <input class="btn btn-outline-dark mt-3" type="submit" name="submit" value="Tekst versturen">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
    let characterSpan = document.getElementById('characterCount')

    function countCharacters(text) {
        characterSpan.innerText = text.length
    }
    </script>
</body>

</html>