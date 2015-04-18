<?php

namespace Resume;

$options = array(
    'namespace' => array('Resume' => __DIR__),
    'application' => array()
);

require_once('../spiffy/bootstrap.php');

$application->setController(new Controllers\Test());
$application->setMethod('testMethod');

$application->run();

$request = new \SPF\HTTP\Request();