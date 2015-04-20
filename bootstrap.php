<?php

define('__BASE__', __DIR__);
define('__PROJECT_NAMESPACE__', 'ResumeService');

$loader = require 'vendor/autoload.php';
$loader->addPsr4(__PROJECT_NAMESPACE__ . '\\', __BASE__ . '/Resume');

$application = new SPF\Application();