<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{

    protected $users;
    protected $mRequest;

    function __construct()
    {
        $this->users = new UsersModel();
        $this->mRequest = service("request");
    }

    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/home');
        }

        return view('login');
    }

    public function process()
    {
        $username = $this->mRequest->getVar('username');
        $password = $this->mRequest->getVar('password');
        $dataUser = $this->users->where([
            'username' => $username,
            'level' => 'admin',
            'is_aktif' => '1'
        ])->first();

        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                $this->session->set([
                    'username' => $dataUser->username,
                    'nama' => $dataUser->nama,
                    'level' => $dataUser->level,
                    'logged_in' => TRUE
                ]);
                return redirect()->to('/home');
            } else {
                session()->setFlashdata('error', 'Username dan password tidak sesuai');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username dan password tidak sesuai');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
