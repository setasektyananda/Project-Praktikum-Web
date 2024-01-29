<?php
class Peminjaman extends Controller
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
        $data['title'] = 'Data Peminjaman';
        $data['peminjaman'] = $this->model('PeminjamanModel')->getAllPeminjaman();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('peminjaman/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Peminjaman';
        $data['buku'] = $this->model('BukuModel')->getAllBuku();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('peminjaman/create', $data);
        $this->view('templates/footer');
    }

    public function simpanPeminjaman()
    {
        if ($this->model('PeminjamanModel')->tambahPeminjaman($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/peminjaman');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/peminjaman');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Peminjaman';
        $data['peminjaman'] = $this->model('PeminjamanModel')->getAllPeminjaman();
        $data['buku'] = $this->model('BukuModel')->getBukuById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('peminjaman/edit', $data);
        $this->view('templates/footer');
    }

    public function updatePeminjaman()
    {
        if ($this->model('PeminjamanModel')->updateDataPeminjaman($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location: ' . base_url . '/peminjaman');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/peminjaman');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('PeminjamanModel')->deletePeminjaman($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location: ' . base_url . '/peminjaman');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/peminjaman');
            exit;
        }
    }

    public function cari()
    {
        $data['title'] = 'Data Peminjaman';
        $data['peminjaman'] = $this->model('PeminjamanModel')->cariBuku();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('peminjaman/index', $data);
        $this->view('templates/footer');
    }

    public function lihatlaporanpeminjaman()
    {
        $data['title'] = 'Data Laporan Peminjaman';
        $data['peminjaman'] = $this->model('PeminjamanModel')->getAllPeminjaman();
        $this->view('peminjaman/lihatlaporanpeminjaman', $data);
    }


    public function laporan()
    {
        $data['peminjaman'] = $this->model('PeminjamanModel')->getAllPeminjaman();
        $pdf = new FPDF('p', 'mm', 'A4');

        // membuat halaman baru 
        $pdf->AddPage();
        // setting jenis font yang akan digunakan 
        $pdf->SetFont('Arial', 'B', 14);
        // mencetak string  
        $pdf->Cell(190, 7, 'LAPORAN PEminjaman', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat 
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(85, 6, 'NAMA PEMINJAM', 1);
        $pdf->Cell(60, 6, 'BUKU', 1);
        $pdf->Cell(30, 6, 'TANGGAL', 1);
        $pdf->Ln();
        $pdf->SetFont('Arial', '', 10);

        foreach ($data['buku'] as $row) {
            $pdf->Cell(85, 6, $row['nama_peminjam'], 1);
            $pdf->Cell(30, 6, $row['judul'], 1);
            $pdf->Cell(30, 6, $row['tgl'], 1);
            $pdf->Ln();
        }

        $pdf->Output('I', 'Laporan Buku.pdf', true);
    }
}
