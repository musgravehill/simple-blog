<?php

namespace lib\SSB\views;

use lib\SSB\models as Models;

class node {

    public function showNode($url) {
        $Node = new Models\Node;
        $RelatedNodes = new Models\RelatedNodes;
        $node = $Node->getNode($url);
        $relatedNodes = $RelatedNodes->getRelatedNodes($node->id, 5);  
        $content = $node->body;
        foreach ($relatedNodes as $relatedNode){
            $content .= '<a href="/'. $relatedNode->url_name.'">'. $relatedNode->name.'</a><br>';
        }
        $result = array(
            'content' => $content,
            'title' => $node->name,
            'description' => $node->description,
            'keywords' => $node->keywords,
        );
        return $result;
    }

}
