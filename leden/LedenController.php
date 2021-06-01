<?php

namespace leden;
use assets\php\Database;
use PDO;

class LedenController extends Database {
    public function getMostUsedWords() {
        $stmt = $this->connection->prepare("SELECT woord FROM woorden ORDER BY aantalInTeksten DESC LIMIT 10");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getLeastUsedWords() {
        $stmt = $this->connection->prepare("SELECT woord FROM woorden ORDER BY aantalInTeksten LIMIT 10");
        $stmt->execute();

        return $stmt->fetchAll();
    }
}