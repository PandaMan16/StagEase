<?php

 abstract class Bdd{

    private $ip = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $bd = 'StagEase';

    public function Connect(){
        try {
            $pdo = new PDO("mysql:host=$this->ip;dbname=$this->bd", $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch ( PDOException $th ) {
            return new Exception ($th->getMessage());
        }
    }

}