<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Produk extends ResourceController
{
    protected $format = 'json';
    protected $modelName = 'App\Models\ProdukModel';
    protected $mRequest;

    function __construct()
    {
        $this->mRequest = service('request');
    }

    public function index()
    {
        $nama = $this->mRequest->getVar('nama');
        $id_kategori = $this->mRequest->getVar('id_kategori');

        $likeName = [];
        $whereKategori = [];

        if (!empty($nama)) {
            $likeName = ['nama_produk' => $nama];
        }

        if (!empty($id_kategori)) {
            $whereKategori = ['id_kategori' => $id_kategori];
        }

        $dataProduk = $this->model->like($likeName)->where($whereKategori)->findAll();
        return $this->respond($dataProduk);
    }
}
