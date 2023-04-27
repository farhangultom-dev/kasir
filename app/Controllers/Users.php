<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
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
        $data['title'] = "Data Users";
        $data['users'] = $this->users->paginate($this->perPage, 'users');
        $data['pager'] = $this->users->pager;
        $data['nomor'] = nomor($this->mRequest->getVar('page_users'), $this->perPage);
        return view('users/index', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah User";
        return view('users/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[users.username]|max_length[255]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'is_unique' => 'Username telah digunakan, gunakan username lainnya',
                    'max_length' => 'Maksimal 255 karakter'
                ]
            ],
            'nama' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'max_length' => 'Maksimal 255 karakter'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->users->insert([
            'username' => $this->mRequest->getVar('username'),
            'password' => password_hash($this->mRequest->getVar('password'), PASSWORD_BCRYPT),
            'nama' => $this->mRequest->getVar('nama'),
            'level' => $this->mRequest->getVar('level'),
            'is_aktif' => $this->mRequest->getVar('is_aktif'),
        ]);

        session()->setFlashdata('message', 'Tambah data user berhasil');
        return redirect()->to('/user');
    }

    public function edit($username)
    {
        $dataUser = $this->users->find($username);
        if (empty($dataUser)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data user tidak ditemukan !!');
        }
        $data['users'] = $dataUser;
        $data['title'] = "Edit Users";
        return view('users/edit', $data);
    }

    public function update($username)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'max_length' => '{field} Maksimal 255 karakter'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $data = [
            'nama' => $this->mRequest->getVar('nama'),
            'level' => $this->mRequest->getVar('level'),
            'is_aktif' => $this->mRequest->getVar('is_aktif')
        ];

        if (!empty($this->mRequest->getVar('password'))) {
            $data['password'] = password_hash($this->mRequest->getVar('password'), PASSWORD_BCRYPT);
        }

        $this->users->update($username, $data);
        session()->setFlashdata('message', 'Update data berhasil');
        return redirect()->to('/user');
    }

    public function delete($username)
    {
        $dataUsers = $this->users->find($username);

        if (empty($dataUsers)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data user tidak ditemukan !!');
        }
        $this->users->delete($username);
        session()->setFlashdata('message', 'Delete data berhasil di lakukan');
        return redirect()->to('/user');
    }
}
