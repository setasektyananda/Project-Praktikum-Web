<?php
class PeminjamanModel
{
    private $table = 'peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPeminjaman()
    {
        $this->db->query('SELECT peminjaman.*, buku.judul FROM ' . $this->table . ' JOIN buku ON buku.id = peminjaman.buku_id');

        return $this->db->resultSet();
    }

    public function getPeminjamanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE peminjaman.id=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahPeminjaman($data)
    {
        $query = "INSERT INTO peminjaman(nama_peminjam, buku_id) VALUES (:nama_peminjam, :buku_id)";
        $this->db->query($query);
        $this->db->bind('nama_peminjam', $data['nama_peminjam']);
        $this->db->bind('buku_id', $data['buku_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataBuku($data)
    {
        $query = "UPDATE buku SET judul=:judul, penerbit=:penerbit, pengarang=:pengarang, tahun=:tahun, kategori_id=:kategori_id, harga=:harga WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('penerbit', $data['penerbit']);
        $this->db->bind('pengarang', $data['pengarang']);
        $this->db->bind('tahun', $data['tahun']);
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->bind('harga', $data['harga']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deletePeminjaman($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariBuku()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT * FROM ' . $this->table . ' JOIN kategori ON kategori.id = buku.kategori_id WHERE judul LIKE :key');
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
