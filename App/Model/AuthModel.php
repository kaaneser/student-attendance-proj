<?php

namespace App\Model;

use Core\BaseModel;

class AuthModel extends BaseModel
{
    public function login($data)
    {
        $userId = $data->user_id;
        $password = md5($data->pass);

        $query = $this->db->query("SELECT * FROM user WHERE user_id='$userId' AND pass='$password' AND user_type='$data->user_type'");
        if (gettype($query) == 'array') {
            return ['logged' => true, 'data' => $query];
        } else {
            return ['logged' => false];
        }
    }
}