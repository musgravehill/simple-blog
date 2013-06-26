<?php

namespace lib\SSB {

    use PDO;

    class DB {

        private static $_host = 'localhost';
        private static $_username = 'url';
        private static $_password = 'prl';
        private static $_db = 'rl-v2';
        protected static $_conn = null;

        public function __construct() {
            try {
                self::$_conn = new PDO('mysql:host=' . self::$_host . ';dbname=' . self::$_db, self::$_username, self::$_password);
                self::$_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            }            
        }

        public function __destruct() {
            self::$_conn = null;
        }

    }

}