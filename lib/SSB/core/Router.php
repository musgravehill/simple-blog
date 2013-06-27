<?php

namespace lib\SSB\core;

use lib\SSB\views as Views;

class Router {

    public function __construct() {
        $stopRoute = FALSE;
        $request = explode('/', $_SERVER['REQUEST_URI']);

        //show node by url
        $pattern = '/\.html/';
        if (preg_match($pattern, $_SERVER['REQUEST_URI'], $matches)) {
            $url = $request[1];
            $nodeView = new Views\node;
            $result = $nodeView->showNode($url);
            $content = $result['content'];
            $title = $result['title'];
            $description = $result['description'];
            $keywords = $result['keywords'];
            include 'lib/SSB/views/layout/main.php';
            $stopRoute = TRUE;
        }
        //show community by name and page
        $pattern = '/community\/.*/';
        if ((!$stopRoute) && (preg_match($pattern, $_SERVER['REQUEST_URI'], $matches))) {
            $community_name = $request[2];
            (isset($request[3])) ? $page = (int) $request[3] : $page = 0;
            $communityView = new Views\community;
            $result = $communityView->showNodes($community_name,$page);
            $content = $result['content'];
            $title = $result['title'];
            $description = $result['description'];
            $keywords = $result['keywords'];
            include 'lib/SSB/views/layout/main.php';
            $stopRoute = TRUE;
        }
        //show blog by page
        if (!$stopRoute) {
            (isset($request[1])) ? $page = (int) $request[1] : $page = 0;
            $blogView = new Views\blog;
            $result = $blogView->showNodes($page);
            $content = $result['content'];
            $title = $result['title'];
            $description = $result['description'];
            $keywords = $result['keywords'];
            include 'lib/SSB/views/layout/main.php';
            $stopRoute = TRUE;
        }
    }

}