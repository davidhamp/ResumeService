<?php

define('__BASE__', __DIR__);
define('__PROJECT_NAMESPACE__', 'ResumeService');

$loader = require 'vendor/autoload.php';
$loader->add(__PROJECT_NAMESPACE__, __BASE__ . '/src');

$application = new SPF\Application();