<?php

class Database
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=".DB_HOST."; port=".DB_PORT."; dbname=".DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

    public function select($query, $bindings = [])
    {
        $sth = $this->pdo->prepare($query);
        $sth->execute($bindings);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
		$result ??= false;
		return $result;
    }

    public function query($query, $bindings = [])
    {
        $sth = $this->pdo->prepare($query);
        return $sth->execute($bindings);
    }
}
