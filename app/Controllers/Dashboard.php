<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\XAIaggsModel;
use App\Models\ColorsModel;


class Dashboard extends BaseController
{
    public function index()
    {
        $userModel = model(UserModel::class);
        $XAIaggModel = model(XAIaggsModel::class);
        $colorModel = model(ColorsModel::class);

        $session = session();

        $data = [
            'user' => $userModel->getUser($session->get('id')),
            'XAIaggs' => $XAIaggModel->getXAIaggs($session->get('id')),
            'colors' => $colorModel->getColors($session->get('id')),
            'session' => $session
        ];

        return view('templates/header', $data)
            . view('templates/navbar')
            . view('pages/dashboard')
            . view('templates/footer');
    }
}