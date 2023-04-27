<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Login extends ResourceController
{
    protected $format = 'json';
    protected $modelName = 'App\Models\UsersModel';
    protected $mRequest;

    function __construct()
    {
        $this->mRequest = service("request");
    }

    public function login()
    {
        $username = $this->mRequest->getVar('username');
        $password = $this->mRequest->getVar('password');

        $dataUser = $this->model->where([
            'username' => $username,
            'is_aktif' => '1',
            'level !=' => 'admin'
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                $response = [
                    'error' => false,
                    'data' => $dataUser,
                    'message' => 'Login berhasil'
                ];
                return $this->respond($response);
            } else {
                $response = [
                    'error' => true,
                    'message' => 'Username & password tidak di temukan'
                ];
                return $this->respond($response);
            }
        } else {
            $response = [
                'error' => TRUE,
                'message' => 'Username tidak ditemukan'
            ];
            return $this->respond($response);
        }
    }
}
