<?php

namespace ResumeService\Controllers;

use SPF\Controller;

class TestController extends Controller {

    public function TestMethod()
    {
        die('method1');
        return $this->renderView();
    }

    public function TestMethod2()
    {
        die('method2');
        return $this->renderView();
    }

}