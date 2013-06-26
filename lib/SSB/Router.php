<?php

namespace lib\SSB;

class Router {

    public function __construct() {
        $request = explode('/', $_SERVER['REQUEST_URI']);

        //show node by url
        $pattern = '/\.html/';
        if (preg_match($pattern, $_SERVER['REQUEST_URI'], $matches)) {
            $url = $request[1];
            echo 'show node by url = ' . $url;
        }
        //show community by name and page
        $pattern = '/community\/.*/';
        if (preg_match($pattern, $_SERVER['REQUEST_URI'], $matches)) {
            $community_name = $request[2];
            (isset($request[3])) ? $page = (int) $request[3] : $page = 0;
            echo 'show node by community_name = ' . $community_name . ' page =' . $page;
            exit;
        }
        //show blog by page
        (isset($request[1])) ? $page = (int) $request[1] : $page = 0;
        echo 'show blog page =' . $page;
    }

}