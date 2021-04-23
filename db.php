<?php

class Database {
    private $host;
    private $dbname;
    private $user;
    private $password;

    function __construct(string $host, string $dbname, string $user, string $password) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
    }

    public function connect() {
        $conn_str = "mysql:host=". $this->host .";dbname=". $this->dbname;
        
        try {
            $conn = new PDO($conn_str, $this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: ". $e->getMessage();
        }       
    }
}


?>