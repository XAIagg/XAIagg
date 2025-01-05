<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class SignIn extends Controller
{

    public function index()
    {
        helper(['form']);

        return view('templates/header')
            . view('pages/login')
            . view('templates/footer');
    }

    public function auth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatedPassword = password_verify($password, $pass);

            if ($authenticatedPassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['username'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);
                $session->setFlashdata('msg', 'ERROR.');
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email does not exist');
            return redirect()->to('/login');
        }
    }


    public function signOut()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}