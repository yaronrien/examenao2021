<?php

namespace leden;
use assets\php\Database;

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

    public function getMostUsedLetters() {
        $stmt = $this->connection->prepare("SELECT teken FROM letters ORDER BY aantalInWoorden DESC LIMIT 5");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getLeastUsedLetters() {
        $stmt = $this->connection->prepare("SELECT teken FROM letters ORDER BY aantalInWoorden  LIMIT 5");
        $stmt->execute();

        return $stmt->fetchAll();
}
}