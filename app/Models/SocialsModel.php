<?php

namespace App\Models;

use CodeIgniter\Model;

class XAIaggsModel extends Model
{
    protected $table = 'XAIagg_aggregator.XAIaggs';

    protected $allowedFields = ['facebook', 'twitter', 'tiktok', 'instagram', 'youtube', 'linkedin', 'userId'];

    public function getXAIaggs($userId)
    {
        return $this->where(['userId' => $userId])->first();
    }
}