<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\XAIaggsModel;
use App\Models\ColorsModel;


class Profile extends BaseController
{
    public function index($username)
    {
        $userModel = model(UserModel::class);
        $XAIaggModel = model(XAIaggsModel::class);
        $colorModel = model(ColorsModel::class);

        $user = $userModel->where('username', $username)->first();

        $session = session();

        if ($session->get('isLoggedIn')) {
            if ($user) {
                $data = [
                    'user' => $userModel->getUser($user['id']),
                    'XAIaggs' => $XAIaggModel->getXAIaggs($user['id']),
                    'colors' => $colorModel->getColors($user['id']),
                    'session' => $session

                ];

                return view('templates/header', $data)
                    . view('templates/navbar')
                    . view('pages/profile_card')
                    . view('templates/footer');
            } else {
                return view('templates/header')
                    . view('pages/user_not_found')
                    . view('templates/footer');
            }
        } else {
            if ($user) {
                $data = [
                    'user' => $userModel->getUser($user['id']),
                    'XAIaggs' => $XAIaggModel->getXAIaggs($user['id']),
                    'colors' => $colorModel->getColors($user['id']),
                    'session' => $session

                ];

                return view('templates/header', $data)
                    . view('pages/profile_card')
                    . view('templates/footer');
            } else {
                return view('templates/header')
                    . view('pages/user_not_found')
                    . view('templates/footer');
            }
        }




    }


    public function update()
    {
        $session = session();
        $userModel = model(UserModel::class);
        $XAIaggModel = model(XAIaggsModel::class);
        $colorModel = model(ColorsModel::class);

        $data = $userModel->where('id', $session->get('id'))->first();

        if ($data) {
            if (!$this->request->is('post')) {
                $data = [
                    'user' => $userModel->getUser($session->get('id')),
                    'colors' => $colorModel->getColors($session->get('id')),
                    'XAIaggs' => $XAIaggModel->getXAIaggs($session->get('id')),
                    'session' => $session
                ];
                return view('templates/header', $data)
                    . view('templates/navbar')
                    . view('pages/profile_edit')
                    . view('templates/footer');
            } else {
                $rules = [
                    'user_img' => 'required|min_length[3]|max_length[155]',
                    'name' => 'required|min_length[3]|max_length[50]',
                    'username' => 'required|min_length[3]|max_length[50]',
                    'email' => 'required|min_length[10]|max_length[155]|valid_email',
                ];

                if ($this->validate($rules)) {
                    $updateData = [
                        'user_img' => $this->request->getPost('user_img'),
                        'name' => $this->request->getPost('name'),
                        'username' => $this->request->getPost('username'),
                        'email' => $this->request->getPost('email'),


                    ];
                    $userModel->where('id', $session->get('id'))->set($updateData)->update();
                    return redirect()->to('/dashboard');
                }
            }

        } else {
            $session->setFlashdata('msg', "User Not found");
            return redirect()->to('/login');
        }
    }

    public function updateColors()
    {
        $session = session();
        $colorModel = model(ColorsModel::class);


        $rules = [
            'bg_color' => 'required',
            'txt_color' => 'required',
            'acc_color' => 'required',
        ];

        if ($this->validate($rules)) {
            $updateData = [
                'bg_color' => $this->request->getPost('bg_color'),
                'txt_color' => $this->request->getPost('txt_color'),
                'acc_color' => $this->request->getPost('acc_color'),


            ];
            $colorModel->where('userId', $session->get('id'))->set($updateData)->update();
            return redirect()->to('/dashboard');
        }
    }

    public function updateXAIaggs()
    {
        $session = session();
        $XAIaggsModel = model(XAIaggsModel::class);


        $rules = [
            'facebook' => 'required|min_length[3]|max_length[20]',
            'youtube' => 'required|min_length[3]|max_length[20]',
            'instagram' => 'required|min_length[3]|max_length[20]',
            'tiktok' => 'required|min_length[3]|max_length[20]',
            'twitter' => 'required|min_length[3]|max_length[20]',
            'linkedin' => 'required|min_length[3]|max_length[20]',
        ];

        if ($this->validate($rules)) {
            $updateData = [
                'facebook' => $this->request->getPost('facebook'),
                'youtube' => $this->request->getPost('youtube'),
                'instagram' => $this->request->getPost('instagram'),
                'tiktok' => $this->request->getPost('tiktok'),
                'twitter' => $this->request->getPost('twitter'),
                'linkedin' => $this->request->getPost('linkedin'),

            ];
            $XAIaggsModel->where('userId', $session->get('id'))->set($updateData)->update();
            return redirect()->to('/dashboard');
        }
    }
}