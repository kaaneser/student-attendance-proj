<?php

namespace App\Controller;

use Core\BaseController;

class PageController extends BaseController
{
    public function login()
    {
        echo $this->view->load('login');
    }

    public function addproduct()
    {
        echo $this->view->load('addproduct');
    }
}