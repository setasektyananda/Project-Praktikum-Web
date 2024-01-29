<?php
class MahasiswaModel
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa(nama_mahasiswa) VALUES (:nama_mahasiswa)";
        $this->db->query($query);
        $this->db->bind('nama_mahasiswa', $data['nama_mahasiswa']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataMahasiswa($data)
    {
        $query = 'UPDATE mahasiswa SET nama_mahasiswa=:nama_mahasiswa WHERE id=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_mahasiswa', $data['nama_mahasiswa']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteMahasiswa($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariMahasiswa()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama_mahasiswa LIKE :key');
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
