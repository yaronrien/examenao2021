<?php

namespace leden\woord;
use assets\php\Database;
use PDO;

class WoordController extends Database {
    public function getWordDetails() {
        $sql = 'SELECT woorden.aantalInTeksten, woorden.aantalKlinkers, woorden.aantalMedeklinkers, teksten.tekstTitel, teksten.tekstID, woorden.woord FROM woorden
        LEFT JOIN tekstwoorden ON woorden.woordID = tekstwoorden.woordID
        LEFT JOIN teksten ON tekstwoorden.tekstID = teksten.tekstID WHERE woorden.woordID = :woordID;';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':woordID', $_GET['woordID'], PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll();
        
        return $this->redirect($results);
    }

    public function getWords() {
        $sql = 'SELECT woorden.aantalInTeksten, woorden.aantalKlinkers, woorden.aantalMedeklinkers, teksten.tekstTitel, teksten.tekstID, woorden.woord, woorden.woordID FROM woorden
        LEFT JOIN tekstwoorden ON woorden.woordID = tekstwoorden.woordID
        LEFT JOIN teksten ON tekstwoorden.tekstID = teksten.tekstID WHERE woorden.woordID';
    
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $this->redirect($results);
    }
}

