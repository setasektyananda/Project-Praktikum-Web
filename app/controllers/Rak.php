<?php
class Rak extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
            header('location: ' . base_url . '/login');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Data Rak';
        $data['rak'] = $this->model('RakModel')->getAllRak();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('rak/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Rak';
        $data['rak'] = $this->model('RakModel')->cariRak();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('rak/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Rak';
        $data['rak'] = $this->model('RakModel')->getRakById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('rak/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Rak';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('rak/create', $data);
        $this->view('templates/footer');
    }

    public function simpanRak()
    {
        if ($this->model('RakModel')->tambahRak($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/rak');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/rak');
            exit;
        }
    }

    public function updateRak()
    {
        if ($this->model('RakModel')->updateDataRak($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/rak');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/rak');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('RakModel')->deleteRak($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/rak');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/rak');
            exit;
        }
    }
}
