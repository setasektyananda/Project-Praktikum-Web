<?php
class PenerbitModel
{
    private $table = 'penerbit';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPenerbit()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getPenerbitById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahPenerbit($data)
    {
        $query = "INSERT INTO penerbit(nama_penerbit, alamat_penerbit, nomor_telp) VALUES (:nama_penerbit, :alamat_penerbit, :nomor_telp)";
        $this->db->query($query);
        $this->db->bind('nama_penerbit', $data['nama_penerbit']);
        $this->db->bind('alamat_penerbit', $data['alamat_penerbit']);
        $this->db->bind('nomor_telp', $data['nomor_telp']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPenerbit($data)
    {
        $query = 'UPDATE penerbit SET nama_penerbit=:nama_penerbit, alamat_penerbit=:alamat_penerbit, nomor_telp=:nomor_telp WHERE id=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_penerbit', $data['nama_penerbit']);
        $this->db->bind('alamat_penerbit', $data['alamat_penerbit']);
        $this->db->bind('nomor_telp', $data['nomor_telp']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deletePenerbit($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPenerbit()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama_penerbit LIKE :key');
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
