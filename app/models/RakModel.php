<?php
class RakModel
{
    private $table = 'rak';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllRak()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getRakById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahRak($data)
    {
        $query = "INSERT INTO rak(nama_rak, lantai) VALUES (:nama_rak, :lantai)";
        $this->db->query($query);
        $this->db->bind('nama_rak', $data['nama_rak']);
        $this->db->bind('lantai', $data['lantai']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataRak($data)
    {
        $query = 'UPDATE rak SET nama_rak=:nama_rak, lantai=:lantai WHERE id=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_rak', $data['nama_rak']);
        $this->db->bind('lantai', $data['lantai']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteRak($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariRak()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama_rak LIKE :key');
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
