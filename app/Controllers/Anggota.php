<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    protected $anggotaModel;

    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Anggota Klub',
            'anggota' => $this->anggotaModel->findAll()
        ];
        return view('anggota/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Anggota'];
        return view('anggota/create', $data);
    }

    public function store()
    {
        // Validasi input dan file gambar
        $rules = [
            'nama' => 'required',
            'posisi' => 'required',
            'foto' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil file foto
        $fileFoto = $this->request->getFile('foto');

        // Cek apakah tidak ada gambar yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.jpg';
        } else {
            // Generate nama file random agar tidak bentrok
            $namaFoto = $fileFoto->getRandomName();
            // Pindahkan file ke folder public/uploads
            $fileFoto->move('uploads', $namaFoto);
        }

        $this->anggotaModel->save([
            'nama' => $this->request->getPost('nama'),
            'posisi' => $this->request->getPost('posisi'),
            'foto' => $namaFoto
        ]);

        return redirect()->to('/anggota')->with('pesan', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Anggota',
            'anggota' => $this->anggotaModel->find($id)
        ];
        return view('anggota/edit', $data);
    }

    public function update($id)
    {
        // Validasi
        $rules = [
            'nama' => 'required',
            'posisi' => 'required',
            'foto' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileFoto = $this->request->getFile('foto');
        $anggotaLama = $this->anggotaModel->find($id);

        // Cek gambar, apakah tetap gambar lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $anggotaLama['foto'];
        } else {
            // Generate nama file baru
            $namaFoto = $fileFoto->getRandomName();
            // Pindahkan file
            $fileFoto->move('uploads', $namaFoto);
            
            // Hapus file lama jika bukan default.jpg
            if ($anggotaLama['foto'] != 'default.jpg') {
                unlink('uploads/' . $anggotaLama['foto']);
            }
        }

        $this->anggotaModel->save([
            'id' => $id,
            'nama' => $this->request->getPost('nama'),
            'posisi' => $this->request->getPost('posisi'),
            'foto' => $namaFoto
        ]);

        return redirect()->to('/anggota')->with('pesan', 'Data berhasil diubah.');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $anggota = $this->anggotaModel->find($id);

        // Hapus gambar dari folder jika bukan gambar default
        if ($anggota['foto'] != 'default.jpg') {
            unlink('uploads/' . $anggota['foto']);
        }

        $this->anggotaModel->delete($id);
        return redirect()->to('/anggota')->with('pesan', 'Data berhasil dihapus.');
    }
}