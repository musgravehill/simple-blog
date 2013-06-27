<?php

namespace lib\SSB\views;

use lib\SSB\models as Models;

class community {

    private static $_countOnPage = 10;

    public function showNodes($community_name,$page) {
        $Node = new Models\Node;  
        $Community = new Models\Community;
        $offset = $page * self::$_countOnPage;
        $limit = self::$_countOnPage;
        $community = $Community->getCommunity($community_name);
        $content='';
        $nodes = $Node->getNodesByCommunity($community->id,$offset, $limit);
        foreach ($nodes as $node){            
            $content .= '<h2>'.$node->name.'</h2>';
            $content .= mb_substr(strip_tags($node->body), 0, 96, "utf-8");            
        }       
        
        $result = array(
            'content' => $content,
            'title' => '',
            'description' => '',
            'keywords' => '',
        );
        return $result;
    }

}
