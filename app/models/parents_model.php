<?php
class Parents_model
{
    private $stmt;
    private $db;
    private $table = 'parents';
    public function __construct()
    {
        $this->db  = new Database;
    }
    public function getAllParents()
    {
        $query = 'SELECT * FROM ' . $this->table . ' JOIN users on parents.id_user = users.id_user JOIN students on parents.id_student=students.id_student';
        $this->db->query($query);
        return $this->db->result();
    }

    public function getParent($id)
    {
        $this->stmt = 'SELECT * FROM ' . $this->table . ' WHERE id_parents=:id';
        $this->db->query($this->stmt);
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function addParents($data)
    {
        try {
            $this->stmt = 'INSERT INTO ' . $this->table . ' (no_telp,alamat,id_user,id_student) VALUES(:no_telp,:alamat,:id_user,:id_student)';
            $this->db->query($this->stmt);
            $this->db->bind('no_telp', $data['telepon']);
            $this->db->bind('alamat', $data['alamat']);
            $this->db->bind('id_user', $data['id_user']);
            $this->db->bind('id_student', $data['student_id']);
            $this->db->execute();
            return $this->db->rowCount();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function updtParents($data)
    {
        try {
            $this->stmt = 'UPDATE ' . $this->table . ' SET id_user=:id_user,no_telp=:no_telp,alamat=:alamat,id_student=:id_student WHERE id_parents=:id';
            $this->db->query($this->stmt);
            $this->db->bind('no_telp', $data['telpon']);
            $this->db->bind('alamat', $data['alamat']);
            $this->db->bind('id_user', $data['id_user']);
            $this->db->bind('id_student', $data['id_student']);
            $this->db->bind('id', $data['id_parents']);
            $this->db->execute();
            return $this->db->rowCount();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function delParents($id)
    {
        try {
            $this->stmt = 'DELETE FROM ' . $this->table . ' WHERE id_parents=:id';
            $this->db->query($this->stmt);
            $this->db->bind('id', $id);
            $this->db->execute();
            return $this->db->rowCount();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getParentsByUserId($user_id)
    {
        try {
            $this->stmt = 'SELECT * FROM ' . $this->table . ' WHERE id_user=:user_id';
            $this->db->query($this->stmt);
            $this->db->bind('user_id', $user_id);
            return $this->db->single();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
