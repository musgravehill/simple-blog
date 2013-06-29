<?php

namespace lib\SSB\models;

use PDO,
    lib\SSB\core as Core;

class Tag extends Core\DB {

    public $id;
    public $name;    
    private static $_table = 'tags';
    protected static $_conn = null;

    public function __construct() {
        parent::__construct();
        self::$_conn = parent::$_conn;
    }

    public function __destruct() {
        parent::__destruct();
    }

    public function getTags() {
        $stmt = self::$_conn->query('SELECT * FROM tags ORDER BY name ASC ');
        # Map results to object
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'lib\SSB\models\Tag');
        $tags = $stmt->fetchAll();
        return $tags;
    }
    public function getNodeTags($nid) {
        $stmt = self::$_conn->prepare('SELECT tags.name as t_name
            FROM tags,nodes_tags
            WHERE
            nodes_tags.tid = tags.id 
            AND nodes_tags.nid = :nid
            ORDER BY name ASC ');
        $stmt->execute(array('nid' => $nid));
        # Map results to object
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'lib\SSB\models\Tag');
        $nodeTags = $stmt->fetchAll();
        return $nodeTags;
    }
    public function getTag($tag_name) {
        $stmt = self::$_conn->prepare('SELECT * FROM tags WHERE tags.name = :tag_name  LIMIT 1 ');
        $stmt->execute(array('tag_name' => $tag_name));
        # Map results to object
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'lib\SSB\models\Tag');
        $tag = $stmt->fetch();
        return $tag;
    }

}


