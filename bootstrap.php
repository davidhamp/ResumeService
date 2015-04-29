<?php

namespace ResumeService;

use SPF;
use SPF\Dependency\DependencyManager;

define('__BASE__', __DIR__);
define('__PROJECT_NAMESPACE__', 'ResumeService');

$loader = require 'vendor/autoload.php';
$loader->addPsr4(__PROJECT_NAMESPACE__ . '\\', __BASE__ . '/Resume');

DependencyManager::addProviderLocation(__PROJECT_NAMESPACE__, __PROJECT_NAMESPACE__ . '\\Providers');

$application = new SPF\Application();