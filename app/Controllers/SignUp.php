<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\ColorsModel;
use App\Models\XAIaggsModel;

class SignUp extends Controller
{

    public function index()
    {
        helper(['form']);
        return view('templates/header')
            . view('pages/signUp')
            . view('templates/footer');
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|min_length[10]|max_length[155]|valid_email|is_unique[user.email]',
            'password' => 'required|min_length[6]|max_length[155]',
            'confirmPassword' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $colorModel = new ColorsModel();
            $XAIaggsModel = new XAIaggsModel();
            $data = [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            $userModel->save($data);

            $userId = $userModel->getInsertID();

            // Registring the colors for the new user
            $colorData = ['userId' => $userId,];
            $colorModel->insert($colorData);

            // Registring the XAIaggs for the new user
            $XAIaggsData = ['userId' => $userId,];
            $XAIaggsModel->insert($XAIaggsData);



            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            return view('templates/header')
                . view('pages/signUp', $data)
                . view('templates/footer');
        }
    }

}