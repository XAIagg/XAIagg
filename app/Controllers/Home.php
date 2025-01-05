<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        if ($session->has('id')) {
            $data = [
                'username' => $session->get('name')
            ];

            return view('templates/header')
                . view('templates/navbar', $session)
                . view('home')
                . view('templates/footer');
        }

        return view('templates/header')
            . view('home')
            . view('templates/footer');

    }
}