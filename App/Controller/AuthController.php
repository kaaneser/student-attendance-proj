<?php

namespace App\Controller;

use App\Model\AuthModel;
use Core\BaseController;

class AuthController extends BaseController
{
    public function login()
    {
        $data = json_decode($_POST['user']);
        
        $AuthModel = new AuthModel();
        $login = $AuthModel->login($data);

        if (!$login['logged']) {
            print_r("err");
        } else {
            print_r($login['data']['user_type']);
        }
    }

    // public function massDelete()
    // {
    //     $products = explode(",", $_POST['productList']);
    //     for ($i=0; $i < count($products); $i++) { 
    //         $products[$i] = '"' . $products[$i] . '"';
    //     }
    //     $productList = implode(",", $products);
        
    //     $ProductModel = new ProductModel();
    //     print_r($ProductModel->massDelete($productList));
    // }
}