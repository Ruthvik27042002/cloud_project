<?php

class Dbhandler {
    private $host;
    private $user;
    private $pass;
    private $db;
    private $port;
    public $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        // Azure database credentials
        $this->host = "ruthvik.mysql.database.azure.com";
        $this->user = "ruthvik";
        $this->pass = "Password@123";
        $this->db = "ogtech";
        $this->port = 3306;

        // Create connection with SSL options
        $this->conn = mysqli_init();

        // Set SSL options with the correct path to the CA certificate
        mysqli_ssl_set($this->conn, NULL, NULL, "../DigiCertGlobalRootCA.crt.pem", NULL, NULL);

        // Establish the connection with SSL options
        if (!$this->conn->real_connect($this->host, $this->user, $this->pass, $this->db, $this->port, NULL, MYSQLI_CLIENT_SSL)) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }

    public function conn() {
        // Azure database credentials
        $host = "ruthvik.mysql.database.azure.com";
        $user = "ruthvik";
        $pass = "Password@123";
        $db = "ogtech";
        $port = 3306;

        // Create connection with SSL options
        $this->conn = mysqli_init();

        // Set SSL options with the correct path to the CA certificate
        mysqli_ssl_set($this->conn, NULL, NULL, "../DigiCertGlobalRootCA.crt.pem", NULL, NULL);

        // Establish the connection with SSL options
        if (!$this->conn->real_connect($host, $user, $pass, $db, $port, NULL, MYSQLI_CLIENT_SSL)) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}
