<?php

namespace leden\woord;
use assets\php\Database;

class WoordController extends Database {
    public function getWordDetails() {
        $sql = 'SELECT woorden.aantalInTeksten, woorden.aantalKlinkers, woorden.aantalMedeklinkers, teksten.tekstTitel, teksten.tekstID, woorden.woord FROM woorden
        LEFT JOIN tekstwoorden ON woorden.woordID = tekstwoorden.woordID
        LEFT JOIN teksten ON tekstwoorden.tekstID = teksten.tekstID WHERE woorden.woordID = "' . $_GET['woordID'] . '";';

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }
}

