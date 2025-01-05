<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'XAIagg_aggregator.user';

    protected $allowedFields = ['name', 'username', 'email', 'password', 'user_img'];

    public function getUser($userId)
    {
        return $this->where(['id' => $userId])->first();
    }
}