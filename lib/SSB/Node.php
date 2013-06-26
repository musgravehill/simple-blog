<?php

namespace lib\SSB;

use PDO;

class Node extends DB {

    public $id;
    public $cid;
    public $name;
    public $url_name;
    public $keywords;
    public $description;
    public $body;
    public $created_date;
    private static $_table = 'nodes';
    protected static $_conn = null;

    public function __construct() {
        parent::__construct();
        self::$_conn = parent::$_conn;
    }

    public function __destruct() {
        parent::__destruct();
    }

    public static function getNodes($offset = 0, $limit = 10) {        
        $result = self::$_conn->query("SELECT * FROM nodes LIMIT $offset,$limit ");
        # Map results to object
        $result->setFetchMode(PDO::FETCH_CLASS, 'lib\SSB\Node');
        $nodes = $result->fetchAll();
        return $nodes;
    }

    public static function getNode($url) {        
        $stmt = self::$_conn->prepare('SELECT * FROM nodes WHERE url_name = :url  LIMIT 1 ');
        $stmt->execute(array('url' => $url));        
        # Map results to object
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'lib\SSB\Node');
        $node = $stmt->fetch();
        return $node;
    }

    public static function getNodesBy($offset = 0, $limit = 10, $whereTag = false, $whereCommunity = false) {
        $result = self::$_conn->query("SELECT * FROM nodes LIMIT $offset,$limit ");

        # Map results to object
        $result->setFetchMode(PDO::FETCH_CLASS, 'lib\SSB\Node');

        while ($user = $result->fetch()) {
            # Call our custom full_name method
            echo $user->name;
        }
    }

}

