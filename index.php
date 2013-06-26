<?php

spl_autoload_extensions(".php");
spl_autoload_register();

//new lib\SSB\Router;
////////////////////////////////////////////////////////////////
$Node = new lib\SSB\Node;
$node = $Node->getNode("kosadaka-phantom-fluorocarbon.html");
$content =  $node->body;
$title= '';
$description= '';
$keywords= '';
include '/views/blocks/header.php';
include '/views/blocks/footer.php';

//$Node = new lib\SSB\Node;
//var_dump(  $node->getNodes() );
//$node = $Node->getNode("kosadaka-phantom-fluorocarbon.html");
//var_dump($node);
//echo $node->body;

