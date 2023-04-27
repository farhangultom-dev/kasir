<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategori;
    protected $mRequest;

    function __construct()
    {
        $this->kategori = new KategoriModel();
        $this->mRequest = service("request");
    }

    public function index()
    {
        $keyword = $this->mRequest->getVar('keyword');
        $like = [];
        if ($keyword) {
            $like = ['nama_kategori' => $keyword];
        }

        $data['keyword'] = $keyword;
        $data['kategori'] = $this->kategori->like($like)->withDeleted()->paginate($this->perPage, 'kategori');
        $data['pager'] = $this->kategori->pager;
        $data['nomor'] = nomor($this->mRequest->getVar('page_kategori'), $this->perPage);
        $data['title'] = "Data Kategori";
        return view('kategori/index', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Kategori";
        return view('kategori/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->kategori->insert([
            'nama_kategori' => $this->mRequest->getVar('nama_kategori')
        ]);

        session()->setFlashdata('message', 'Tambah data kategori berhasil ');
        return redirect()->to('/kategori');
    }

    public function edit($id)
    {
        $dataKategori = $this->kategori->find($id);
        if (empty($dataKategori)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data kategori tidak ditemukan');
        }
        $data['kategori'] = $dataKategori;
        $data['title'] = "Edit Kategori";
        return view('kategori/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->kategori->update($id, [
            'nama_kategori' => $this->mRequest->getVar('nama_kategori')
        ]);

        session()->setFlashdata('message', 'Update data kategori berhasil');
        return redirect()->to('/kategori');
    }

    public function delete($id)
    {
        $dataKategori = $this->kategori->find($id);
        if (empty($dataKategori)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data kategori tidak ditemukan');
        }
        $this->kategori->delete($id);
        session()->setFlashdata('message', 'Delete data kategori berhasil');
        return redirect()->to('/kategori');
    }

    public function restore($id)
    {
        $dataKategori = $this->kategori->withDeleted()->find($id);
        if (empty($dataKategori)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data kategori tidak ditemukan');
        }
        $this->kategori->update($id, ['deleted_at' => NULL]);
        session()->setFlashdata('message', 'Restore data berhasil');
        return redirect()->to('/kategori');
    }

    public function permanentdelete($id)
    {
        $dataKategori = $this->kategori->withDeleted()->find($id);
        if (empty($dataKategori)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data kategori tidak ditemukan');
        }
        $this->kategori->delete($id, true);
        session()->setFlashdata('message', 'Hapus data permanent berhasil');
        return redirect()->to('/kategori');
    }
}
