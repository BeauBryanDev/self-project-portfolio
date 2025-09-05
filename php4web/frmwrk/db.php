<?php

namespace frmwrk;
use PDO;

class db {
    private $pdoConnection;
    private $stmt;

    public function __construct() {
        // $dns = "localhost";
        // $dbName = "project-store";
        // $dbUser = "dbkeeper";
        // $dbPass = "Set.Fire.tothe.Rain*528+";
        // $charset = "utf8mb4";

        $dns = sprintf("mysql:host=%s;dbname=%s;charset=%s", 
        config('host'), config('dbname'), config('charset')
        );

        $this->pdoConnection = new PDO($dns, config('user'), config('pass'));
        $this->pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql, $params = []) {

        if (!is_array($params)) {
            $params = [];
        }

        $this->stmt = $this->pdoConnection->prepare($sql);
        $this->stmt->execute($params);

        return $this;
    }

    public function get() {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function firstOrFail() {
        $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            http_response_code(404);
            echo "404 Not Found";
            exit;
        }
        return $result;
    }
}
