<?php

namespace ResumeService\Controllers;

use SPF\Controller;

class Test extends Controller {

    public function testMethod()
    {
        $this->get('test');

        return $this->renderView();
    }

}