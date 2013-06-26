<?php

spl_autoload_extensions(".php");
spl_autoload_register();
////////////////////////////////////////////////////////////////






$Node = new lib\SSB\Node;
//var_dump(  $node->getNodes() );
$node = $Node->getNode("kosadaka-phantom-fluorocarbon.html");
//var_dump($node);
echo $node->body;