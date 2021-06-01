<?php

include_once '../assets/php/Database.php';

class TekstController extends Database {
    private function countCapitals($s) {
        return preg_match_all("/[A-Z]/", $s);
    }

    private function countLowerCase($s) {
        return preg_match_all("/[a-z]/", $s);
    }

    public function saveTekst() {
        $stmt = $this->connection->prepare("INSERT INTO teksten (tekstTitel, tekst, aantalTekens, aantalHoofdLetters, aantalKleineLetters, aantalKlinkers, aantalMedeklinkers, aantalZinnen, toevoegDatum) VALUES(:tekstTitel, :tekst, :aantalTekens, :aantalHoofdLetters, :aantalKleineLetters, :aantalKlinkers, :aantalMedeklinkers, :aantalZinnen,  NOW())");
        $stmt -> bindParam(":tekstTitel", $_POST["tekstTitel"], PDO::PARAM_STR);
        $stmt -> bindParam(":tekst", $_POST["tekst"], PDO::PARAM_STR);

        $aantalTekens = substr_count($_POST['tekst'], '.') + substr_count($_POST['tekst'], ',') + substr_count($_POST['tekst'], '!') + substr_count($_POST['tekst'], '?') + substr_count($_POST['tekst'], ':') + substr_count($_POST['tekst'], ';');
        $stmt -> bindParam(":aantalTekens", $aantalTekens , PDO::PARAM_INT);

        $aantalHoofdletters = $this->countCapitals($_POST['tekst']);
        $stmt -> bindParam(":aantalHoofdLetters", $aantalHoofdletters, PDO::PARAM_INT);

        $aantalKleineLetters = $this->countLowerCase($_POST['tekst']);
        $stmt -> bindParam(":aantalKleineLetters", $aantalKleineLetters , PDO::PARAM_INT);

        $aantalKlinkers = substr_count($_POST['tekst'], 'a') + substr_count($_POST['tekst'], 'e') + substr_count($_POST['tekst'], 'u') + substr_count($_POST['tekst'], 'i') + substr_count($_POST['tekst'], 'o');
        $stmt -> bindParam(":aantalKlinkers", $aantalKlinkers , PDO::PARAM_INT);

        $aantalMedeKlinkers = strlen(str_replace(['a', 'e', 'u', 'i', 'o'], "", $_POST['tekst']));
        $stmt -> bindParam(":aantalMedeklinkers", $aantalMedeKlinkers , PDO::PARAM_INT);

        $aantalZinnen = substr_count($_POST['tekst'], '.') + substr_count($_POST['tekst'], '?') + substr_count($_POST['tekst'], '!') + substr_count($_POST['tekst'], ';');
        $stmt -> bindParam(':aantalZinnen', $aantalZinnen , PDO::PARAM_INT);
        
        $stmt->execute();
        $textID = $this->connection->lastInsertId();
        $textArray = str_replace(['.', ',', '?', '!'], '', $_POST['tekst']);
        $textArray = preg_replace("/\s+/", ' ', $textArray);
        $textArray = explode(' ', $textArray);

        $uniqueWords = [];
        foreach ($textArray as $word) {
            $stmt = $this->connection->prepare("SELECT woord, woordID FROM woorden WHERE woord = '" . $word . "'");
            $stmt->execute();

            $results = $stmt->fetchAll();
            $word = strtolower($word);
            if (!(count($results) > 0)) {
                $vowelCount = substr_count($word, 'a') + substr_count($word, 'e') + substr_count($word, 'u') + substr_count($word, 'i') + substr_count($word, 'o');
                $consonantCount = strlen(str_replace(['a', 'e', 'u', 'i', 'o'], "", $word));
                $stmt = $this->connection->prepare("INSERT INTO woorden (woord, aantalInTeksten, aantalKlinkers, aantalMedeklinkers) VALUES ('" . $word ."', '1', '" . $vowelCount . "', '" . $consonantCount . "')");
                $stmt->execute();

                if (!in_array($word, $uniqueWords)) {
                    $stmt = $this->connection->prepare("INSERT INTO tekstwoorden (TekstID, woordID, aantalInstancesPetTekst) VALUES ('" . $textID ."', '" . $this->connection->lastInsertId() . "', '1')");
                    $stmt->execute();
                    array_push($uniqueWords, $word);
                } else {
                    $stmt = $this->connection->prepare("UPDATE tesktwoorden SET aantalInstancesPetTekst = aantalInstancesPetTekst + 1 WHERE tekstID = " . $textID . " AND WHERE woordID = " . $this->connection->lastInsertId());
                    $stmt->execute();
                }
            } else {
                $stmt = $this->connection->prepare("UPDATE woorden SET aantalInTeksten = aantalInTeksten + 1 WHERE woordID = '" . $results[0]['woordID'] . "'");
                $stmt->execute();

                if (!in_array($word, $uniqueWords)) {
                    $stmt = $this->connection->prepare("INSERT INTO tekstwoorden (TekstID, woordID, aantalInstancesPetTekst) VALUES ('" . $textID ."', '" . $results[0]['woordID'] . "', '1')");
                    $stmt->execute();
                    array_push($uniqueWords, $word);
                } else {
                    $stmt = $this->connection->prepare("UPDATE tekstwoorden SET aantalInstancesPetTekst = aantalInstancesPetTekst + 1 WHERE tekstID = " . $textID . " AND woordID = " . $results[0]['woordID']);
                    $stmt->execute();
                }
            }
        }
    }
}