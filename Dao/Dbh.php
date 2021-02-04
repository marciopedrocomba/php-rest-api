<?php


namespace Dao;

use \PDO;

class Dbh {

    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "rest_api";
    private $timezone;

    //
    protected $dateTime;

    public function __construct() {

        try {

            $this->timezone = new \DateTimeZone("Africa/Luanda");
            $this->dateTime = new \DateTime("now", $this->timezone);

        }catch (\Exception $e) {

            echo "Error: " . $e->getMessage();

        }

    }

    protected function connect() {

        try {

            $dsn = "mysql:host=" . $this->hostname . ";dbname=" . $this->dbname;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;


        }catch (\PDOException $e) {

            echo "Error: " . $e->getMessage();

        }

    }

}