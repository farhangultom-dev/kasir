<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;

class Produk extends BaseController
{
    protected $produk;
    protected $kategori;
    protected $mRequest;
    function __construct()
    {
        $this->produk = new ProdukModel();
        $this->kategori = new KategoriModel();
        $this->mRequest = service("request");
    }

    public function index()
    {
        $kategori = $this->mRequest->getVar('kategori');
        $keyword = $this->mRequest->getVar('keyword');

        $data['id_kategori'] = $kategori;
        $data['keyword'] = $keyword;

        $where = [];
        $like = [];

        if (!empty($kategori)) {
            if ($kategori != "all") {
                $where = ['produk.id_kategori' => $kategori];
            }
        }

        if (!empty($keyword)) {
            $like = ['produk.nama_produk' => $keyword];
        }

        $data['title'] = 'Data Produk';
        $data['produk'] = $this->produk->select('produk.*,kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = produk.id_kategori')
            ->where($where)
            ->like($like)
            ->withDeleted()
            ->paginate($this->perPage, 'produk');
        $data['kategori'] = $this->kategori->findAll();
        $data['pager'] = $this->produk->pager;
        $data['nomor'] = nomor($this->mRequest->getVar('page_produk'), $this->perPage);
        return view('produk/index', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Produk";
        $data['kategori'] = $this->kategori->findAll();
        return view('produk/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_produk' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'harga' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'errors' => [
                        'required' => '{field} hanya boleh di isi angka'
                    ]
                ]
            ],
            'gambar_produk' => [
                'rules' => 'uploaded[gambar_produk]|mime_in[gambar_produk,image/jpg,image/jpeg,image/png,image/gif]|max_size[gambar_produk,2048]',
                'errors' => [
                    'uploaded' => 'Harus ada file yang di upload',
                    'mime_in' => 'File extension harus berupa jpg,jpeg,png,gif',
                    'max_size' => 'Ukuran file maksimal 2MB'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $gambarProduk = $this->mRequest->getFile('gambar_produk');
        $fileName = $gambarProduk->getRandomName();
        $this->produk->insert([
            'id_kategori' => $this->mRequest->getVar('id_kategori'),
            'nama_produk' => $this->mRequest->getVar('nama_produk'),
            'gambar_produk' => $fileName,
            'harga' => $this->mRequest->getVar('harga')
        ]);
        $gambarProduk->move('uploads/produk', $fileName);
        session()->setFlashdata('message', 'Tambah produk sukses');
        return redirect()->to('/produk');
    }

    public function edit($id)
    {
        $dataProduk = $this->produk->find($id);
        if (empty($dataProduk)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data produk tidak ditemukan');
        }
        $data['produk'] = $dataProduk;
        $data['kategori'] = $this->kategori->findAll();
        $data['title'] = "Edit Produk";
        return view('produk/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_produk' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'harga' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'errors' => [
                        'required' => '{field} hanya boleh di isi angka'
                    ]
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $db = \Config\Database::connect();
        $oldData = $db->table('produk')->getWhere(['id_produk' => $id])->getRow();
        $data = [
            'nama_produk' => $this->mRequest->getVar('nama_produk'),
            'id_kategori' => $this->mRequest->getVar('id_kategori'),
            'harga' => $this->mRequest->getVar('harga')
        ];

        $gambarProduk = $this->mRequest->getFile('gambar_produk');
        if (!empty($gambarProduk->getName())) {
            if (!$this->validate([
                'gambar_produk' => [
                    'rules' => 'mime_in[gambar_produk, image/jpg,image/jpeg,image/png,image/gif]|max_size[gambar_produk,2048]',
                    'errors' => [
                        'mime_in' => 'Extention harus berupa jpg,jpeg,png, atau gif',
                        'max_size' => 'Besar file maksimal 2MB'
                    ]
                ]
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back();
            }
            $fileName = $gambarProduk->getRandomName();
            $data['gambar_produk'] = $fileName;
            unlink("uploads/produk/$oldData->gambar_produk");
            $gambarProduk->move('uploads/produk/', $fileName);
        }

        $this->produk->update($id, $data);
        session()->setFlashdata('message', 'Update data produk sukses');
        return redirect()->to('/produk');
    }

    public function delete($id)
    {
        $dataProduk = $this->produk->find($id);

        if (empty($dataProduk)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data produk tidak ditemukan');
        }

        $this->produk->delete($id);
        session()->setFlashdata('message', 'Delete data produk berhasil');
        return redirect()->to('/produk');
    }

    public function restore($id)
    {
        $dataProduk = $this->produk->withDeleted()->find($id);
        if (empty($dataProduk)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data produk tidak ditemukan');
        }
        $this->produk->update($id, [
            'deleted_at' => NULL
        ]);

        session()->setFlashdata('message', 'Restore data produk berhasil');
        return redirect()->to('/produk');
    }

    public function permanentdelete($id)
    {
        $dataProduk = $this->produk->withDeleted()->find($id);
        if (empty($dataProduk)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data produk tidak ditemukan');
        }
        unlink("uploads/produk/$dataProduk->gambar_produk");
        $this->produk->delete($id, true);
        session()->setFlashdata('message', 'Delete permanent data produk berhasil');
        return redirect()->to('/produk');
    }
}
