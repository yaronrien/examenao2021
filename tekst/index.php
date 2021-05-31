<?php
    include_once '../assets/php/partials/navbar.php';
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
      
  <div class="form-group">
  <h1 class="h1 text-center mb-3">Tekst schrijven</h1>
  <h4 class="h4 text-center mb-3">max 500 karakters</h4>
    <input class="form-control input-sm" id="inputsm" type="text">
    </div>
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" onkeyup="countCharacters(this.value)"></textarea>
        <label> Aantal Letters: <span id="characterCount">0</span>/500 </label>
    </div>
  </div>
  <script>
    let characterSpan = document.getElementById('characterCount')
    function countCharacters(text) {
      characterSpan.innerText = text.length
    }
  </script>
</body>
</html>