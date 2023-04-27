<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Keranjang extends ResourceController
{
    protected $format = 'json';
    protected $modelName = 'App\Models\KeranjangModel';
    protected $mRequest;

    function __construct()
    {
        $this->mRequest = service("request");
    }


    function create()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'id_produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'jumlah' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} hanya bisa diisi angka'
                ]
            ],
        ])) {
            $response = [
                'error' => true,
                'message' => $this->validator->getErrors()
            ];
            return $this->respond($response);
        }

        $produk = new \App\Models\ProdukModel();
        $dataProduk = $produk->find($this->mRequest->getVar('id_produk'));

        $this->model->insert([
            'username' => $this->mRequest->getVar('username'),
            'id_produk' => $this->mRequest->getVar('id_produk'),
            'jumlah' => $this->mRequest->getVar('jumlah'),
            'harga' => $dataProduk->harga,
            'total' => ($dataProduk->harga * $this->mRequest->getVar('jumlah'))
        ]);
        $response = [
            'error' => false,
            'message' => 'Menambah data produk keranjang berhasil'
        ];

        return $this->respond($response);
    }

    function index()
    {
        $username = $this->mRequest->getVar('username');
        $path = base_url() . "/uploads/produk/";
        $dataKeranjang = $this->model->select("keranjang.*,CONCAT('$path',produk.gambar_produk) as gambar_produk,produk.nama_produk")
            ->join('produk', 'keranjang.id_produk=produk.id_produk')
            ->where([
                'keranjang.username' => $username
            ])->orderBy('created_at', 'desc')
            ->findAll();

        return $this->respond($dataKeranjang);
    }

    function update($id = NULL)
    {
        if (!$this->validate([
            'jumlah' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} hanya boleh berupa angka'
                ]
            ]
        ])) {
            $response = [
                'error' => true,
                'message' => $this->validator->getErrors()
            ];
            return $this->respond($response);
        }

        $data = $this->mRequest->getRawInput();
        $dataKeranjang = $this->model->find($id);

        $produk = new \App\Models\ProdukModel();
        $dataProduk = $produk->find($dataKeranjang->id_produk);
        $totalHarga = $dataProduk->harga * $data['jumlah'];

        $this->model->update($id, [
            'jumlah' => $data['jumlah'],
            'harga' => $dataProduk->harga,
            'total' => $totalHarga
        ]);

        $response = [
            'error' => false,
            'message' => 'Update data keranjang berhasil'
        ];
        return $this->respond($response);
    }

    function delete($id = NULL)
    {
        $dataKeranjang = $this->model->find($id);
        if ($dataKeranjang) {
            $this->model->delete($id);
            $response = [
                'error' => false,
                'message' => 'Data keranjang berhasil dihapus',
            ];
            return $this->respond($response);
        } else {
            $response = [
                'error' => true,
                'message' => 'Data tidak di temukan'
            ];
            return $this->respond($response);
        }
    }
}
