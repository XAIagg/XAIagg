<?php

namespace App\Models;

use CodeIgniter\Model;

class ColorsModel extends Model
{
    protected $table = 'XAIagg_aggregator.colors';

    protected $allowedFields = ['txt_color', 'acc_color', 'bg_color', 'userId'];

    public function getColors($userId)
    {
        return $this->where(['userId' => $userId])->first();
    }
}