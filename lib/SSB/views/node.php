<?php

namespace lib\SSB\views;

use lib\SSB\models as Models;

class node {

    public function showNode($url) {
        $Node = new Models\Node;
        $node = $Node->getNode($url);
        $result = array(
            'content' => $node->body,
            'title' => $node->name,
            'description' => $node->description,
            'keywords' => $node->keywords,
        );
        return $result;
    }

}
