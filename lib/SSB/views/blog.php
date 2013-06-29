<?php

namespace lib\SSB\views;

use lib\SSB\models as Models;

class blog {

    private static $_countOnPage = 10;

    public function showNodes($page) {
        $Node = new Models\Node;        
        $offset = $page * self::$_countOnPage;
        $limit = self::$_countOnPage;

        $content='<table class="table-condensed">';
        $nodes = $Node->getNodes($offset, $limit);
        foreach ($nodes as $node){
            $content .='<tr>';
            $content .='<td>';
            $content .='<a href="/community/'.$node->c_url_name.'">
                                <img width="96"  style="width:96px;" class="img-circle" src="/uploads/themes/'.$node->c_id.'.jpg" alt="'.$node->c_name.'" title="'.$node->c_name.'">                                                
                        </a>';
            $content .='</td>';
            $content .='<td>';
            $content .= '<a href="/'.$node->url_name.'"><h2>'.$node->name.'</h2></a>';
            $content .= '<span>'.mb_substr(strip_tags($node->body), 0, 128, "utf-8").'...</span>';
            $content .= '<hr style="margin:5px 0px;">';
            $content .= '<a title="рыбтема" class="muted" href="/community/'.$node->c_url_name.'">'.$node->c_name.'</a>';
            $content .= '<span class="muted pull-right">'.date('d-m-Y',strtotime($node->created_date)).'</span>';
            $content .='</td>';
            $content .='</tr>';
               

        }
        $content .= '</table>';
        
        $result = array(
            'content' => $content,
            'title' => '',
            'description' => '',
            'keywords' => '',
        );
        return $result;
    }

}
