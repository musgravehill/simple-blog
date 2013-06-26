<?php

spl_autoload_extensions(".php");
spl_autoload_register();

//new lib\SSB\Router;
////////////////////////////////////////////////////////////////
$Node = new lib\SSB\Node;
$node = $Node->getNode("kosadaka-phantom-fluorocarbon.html");
$content = $node->body;
$title = $node->name;
$description = '';
$keywords = '';
include '/views/layout/main.php';

//$Node = new lib\SSB\Node;
//var_dump(  $node->getNodes() );
//$node = $Node->getNode("kosadaka-phantom-fluorocarbon.html");
//var_dump($node);
//echo $node->body;

