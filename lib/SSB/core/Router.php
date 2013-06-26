<?php

namespace lib\SSB\core;
use lib\SSB\controllers as Controllers;

class Router {

    public function __construct() {
        $request = explode('/', $_SERVER['REQUEST_URI']);

        //show node by url
        $pattern = '/\.html/';
        if (preg_match($pattern, $_SERVER['REQUEST_URI'], $matches)) {
            $url = $request[1];
            $nodeController = new Controllers\node;
            $result = $nodeController->showNode($url);
            $content = $result['content'];
            $title = $result['title'];
            $description = $result['description'];
            $keywords = $result['keywords'];
            include '/views/layout/main.php';
            exit;
        }
        //show community by name and page
        $pattern = '/community\/.*/';
        if (preg_match($pattern, $_SERVER['REQUEST_URI'], $matches)) {
            $community_name = $request[2];
            (isset($request[3])) ? $page = (int) $request[3] : $page = 0;
            echo 'show node by community_name = ' . $community_name . ' page =' . $page;
            $content = $node->body;
            $title = $node->name;
            $description = '';
            $keywords = '';


            exit;
        }
        //show blog by page
        (isset($request[1])) ? $page = (int) $request[1] : $page = 0;
        echo 'show blog page =' . $page;
        $content = $node->body;
        $title = $node->name;
        $description = '';
        $keywords = '';
    }

}