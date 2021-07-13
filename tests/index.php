<?php

// https://stackoverflow.com/questions/61099566/is-it-possible-to-use-redis-or-an-alternative-cache-with-htmlpurifier

require 'vendor/autoload.php';
require 'src/index.php';

$config = HTMLPurifier_Config::createDefault();

$factory = HTMLPurifier_DefinitionCacheFactory::instance();
$factory->register('Redis', 'HTMLPurifier_DefinitionCache_Redis');
$config->set('Cache.DefinitionImpl', 'Redis');

$dirty_html = '<b>Bold';

$purifier = new HTMLPurifier($config);
$clean_html = $purifier->purify($dirty_html);

print $clean_html;