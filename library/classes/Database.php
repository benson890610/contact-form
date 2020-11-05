<?php

    class Database {

        private $driver = DB_DRIVER;
        private $host =   DB_HOST;
        private $user =   DB_USER;
        private $pass =   DB_PASS;
        private $char =   DB_CHAR;
        private $dbname = DB_NAME;

        private $pdo;
        private $stmt;

        public function __construct() {
            $dsn = $this->driver . ":host=" . $this->host . ";dbname=" . $this->dbname . ";charset=" . $this->char;
            $options = array(
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_PERSISTENT         => true
            );
            try {
                $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
            } catch(PDOException $e) {
                $error = "<strong>Database connection error</strong> " . $e->getCode();
                die($error);
            }
        }
        protected function querySingle(string $sql, $fetchMode = NULL) {
            if(empty($sql) || !is_string($sql)) die("Database query error: query command not defined");
            if($fetchMode === PDO::FETCH_CLASS) die("Database fetch error: fetch mode class not allowed in single fetch");

            return $this->pdo->query($sql)->fetch($fetchMode);
        }
        protected function queryAll(string $sql, $fetchMode = NULL) {
            if(empty($sql) || !is_string($sql)) die("Database query error: query command not defined");

            return $this->pdo->query($sql)->fetchAll($fetchMode);
        }
        protected function queryObject(string $sql, string $class) {
            if(empty($sql) || !is_string($sql)) die("Database query error: query command not defined");
            if(empty($class)) die("Database fetch error: object class not defined");

            return $this->pdo->query($sql)->fetchObject($class);
        }
        protected function prepare(string $sql) {
            if(empty($sql) || !is_string($sql)) die("Database query error: query command not defined");

            $this->stmt = $this->pdo->prepare($sql);
        }
        protected function execute(array $params = []) {
            if(is_null($this->stmt)) die("Database prepare error: prepare command not defined");

            return $this->stmt->execute($params);
        }
        protected function single($fetchMode = NULL) {
            if(is_null($this->stmt)) die("Database prepare error: prepare command not defined");
            if($fetchMode === PDO::FETCH_CLASS) die("Database fetch error: fetch mode class not allowed in single fetch");

            return $this->stmt->fetch($fetchMode);
        }
        protected function all($fetchMode = NULL, string $class = '') {
            if(is_null($this->stmt)) die("Database prepare error: prepare command not defined");

            if(!empty($class) && $fetchMode === PDO::FETCH_CLASS) {
                return $this->stmt->fetchAll($fetchMode, $class);
            } else {
                return $this->stmt->fetchAll($fetchMode);
            }
        }

    }