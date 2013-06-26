<?php

spl_autoload_extensions(".php");
spl_autoload_register();
new lib\SSB\core\Router;

echo '<span class="label label-important">'.round(((memory_get_usage())/1024/1024),3).' MB</label>';

