<?php

namespace lib\SSB\models;

use PDO,
    lib\SSB\core as Core;

class Community extends Core\DB {

    public $id;
    public $name;
    public $url_name;
    public $description;
    public $created_date;
    private static $_table = 'community';
    protected static $_conn = null;

    public function __construct() {
        parent::__construct();
        self::$_conn = parent::$_conn;
    }

    public function __destruct() {
        parent::__destruct();
    }

    public function getCommunity($url) {
        $stmt = self::$_conn->prepare('SELECT * FROM community WHERE url_name = :url  LIMIT 1 ');
        $stmt->execute(array('url' => $url));
        # Map results to object
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'lib\SSB\models\Community');
        $community = $stmt->fetch();
        return $community;
    }
    public function getCommunities() {
        $stmt = self::$_conn->query('SELECT * FROM community ORDER BY name ASC ');        
        # Map results to object
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'lib\SSB\models\Community');
        $communities = $stmt->fetchAll();
        return $communities;
    }

}

