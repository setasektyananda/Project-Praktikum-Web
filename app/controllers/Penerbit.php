<?php
class Penerbit extends Controller
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
        $data['title'] = 'Data Penerbit';
        $data['penerbit'] = $this->model('PenerbitModel')->getAllPenerbit();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('penerbit/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Penerbit';
        $data['penerbit'] = $this->model('PenerbitModel')->cariPenerbit();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('penerbit/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Penerbit';
        $data['penerbit'] = $this->model('PenerbitModel')->getPenerbitById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('penerbit/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Penerbit';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('penerbit/create', $data);
        $this->view('templates/footer');
    }

    public function simpanPenerbit()
    {
        if ($this->model('PenerbitModel')->tambahPenerbit($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/penerbit');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/penerbit');
            exit;
        }
    }

    public function updatePenerbit()
    {
        if ($this->model('PenerbitModel')->updateDataPenerbit($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/penerbit');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/penerbit');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('PenerbitModel')->deletePenerbit($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/penerbit');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/penerbit');
            exit;
        }
    }
}
