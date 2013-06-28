<?php

namespace lib\SSB\models;

use PDO,
    lib\SSB\core as Core;

class Node extends Core\DB {

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

    public function getNodes($offset = 0, $limit = 10) {
        $result = self::$_conn->query("SELECT 
                nodes.*,
                community.id as c_id,
                community.name as c_name,
                community.url_name as c_url_name 
                FROM nodes, community 
                WHERE nodes.cid = community.id 
                ORDER BY nodes.id DESC LIMIT $offset,$limit ");
        # Map results to object
        $result->setFetchMode(PDO::FETCH_CLASS, 'lib\SSB\models\Node');
        $nodes = $result->fetchAll();
        return $nodes;
    }

    public function getNode($url) {
        $stmt = self::$_conn->prepare('SELECT * FROM nodes WHERE url_name = :url  LIMIT 1 ');
        $stmt->execute(array('url' => $url));
        # Map results to object
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'lib\SSB\models\Node');
        $node = $stmt->fetch();
        return $node;
    }

    public function getNodesByCommunity($cid, $offset = 0, $limit = 10) {
        $result = self::$_conn->query("SELECT 
                nodes.*                
                FROM nodes
                WHERE nodes.cid = $cid 
                ORDER BY nodes.id DESC LIMIT $offset,$limit ");
        # Map results to object
        $result->setFetchMode(PDO::FETCH_CLASS, 'lib\SSB\models\Node');
        $nodes = $result->fetchAll();
        return $nodes;
    }

}

