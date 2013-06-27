<?php

namespace lib\SSB\views;

use lib\SSB\models as Models;

class blog {

    private static $_countOnPage = 10;

    public function showNodes($page) {
        $Node = new Models\Node;        
        $offset = $page * self::$_countOnPage;
        $limit = self::$_countOnPage;

        $content='';
        $nodes = $Node->getNodes($offset, $limit);
        foreach ($nodes as $node){
            $content .='<a href="/community/'.$node->c_url_name.'">
                            <img src="/uploads/community/logo/64x64/'.$node->c_id.'.jpg" alt="'.$node->c_url_name.'" title="'.$node->c_url_name.'">
                            '.$node->c_url_name.'
                        </a>';
            
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
