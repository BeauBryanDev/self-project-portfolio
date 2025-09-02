<?php

class db {
    private $pdoConnection;

    public function __construct() {
        $dns = "localhost";
        $dbName = "project-store";
        $dbUser = "dbkeeper";
        $dbPass = "Set.Fire.tothe.Rain*528+";
        $charset = "utf8mb4";

        $this->pdoConnection = new PDO("mysql:host=$dns;dbname=$dbName;charset=$charset", $dbUser, $dbPass);
        $this->pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql, $params = []) {
        $stmt = $this->pdoConnection->prepare($sql);
        $stmt->execute($params);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
