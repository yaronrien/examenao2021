<?php
    include_once '../assets/php/partials/navbar.php';
    include_once '../assets/php/partials/config.php';
 
    if(isset($_POST['submit'])){
       try{
            $connection = new PDO($dsn, $username, $password, $options);
        }catch(PDOException $error){
            echo 'Oh jeetje.. Check je database gegevens.. ';
        } 

        $stmt = $connection->prepare("INSERT INTO teksten (tekstTitel, tekst, toevoegDatum) VALUES(:tekstTitel, :tekst, NOW())");

        $stmt -> bindParam(":tekstTitel", $_POST["tekstTitel"], PDO::PARAM_STR);
        $stmt -> bindParam(":tekst", $_POST["tekst"], PDO::PARAM_STR);

        $stmt->execute();

    }
 
  ?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>
<form method="post">
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
      
  <div class="form-group">
  <h1 class="h1 text-center mb-3">Tekst schrijven</h1>
  <h4 class="h4 text-center mb-3">max 500 karakters</h4>
    <input class="form-control input-sm" name="tekstTitel" maxlength = "80"  type="text" placeholder="Titel">
    </div>
        <textarea class="form-control rounded-0" name="tekst" maxlength = "500" rows="10" onkeyup="countCharacters(this.value)"
        placeholder="Schrijf een mooie tekst hier!, misschien over jankees? let wel wel dat je maximaal 500 tekens mag schrijven!" >
        </textarea>
        <label> Aantal Letters: <span id="characterCount">0</span>/500 </label>
    </div>
  </div>
  <script>
    let characterSpan = document.getElementById('characterCount')
    function countCharacters(text) {
      characterSpan.innerText = text.length
      }
      
  </script>
  <input type="submit" name="submit" value="Tekst versturen">
</body>
</html>