<?php
class User_model
{
    private $stmt;
    private $db;
    private $dbh;
    private $table = 'users';
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getUsers($user)
    {
        $this->stmt = 'SELECT * FROM ' . $this->table . ' WHERE username=:user';
        $this->db->query($this->stmt);
        $this->db->bind('user', $user);
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return []; // Return an empty array if no results
        }
    }
    public function getAllUser()
    {
        $this->stmt = 'SELECT * FROM ' . $this->table;
        $this->db->query($this->stmt);
        return $this->db->result();
    }
    public function addUser($data)
    {
        $this->stmt = 'INSERT INTO ' . $this->table . ' (username,password,name,role) VALUES(:user,:pass,:name,:role)';
        $this->db->query($this->stmt);
        $this->db->bind('user', $data['username']);
        $this->db->bind('pass', password_hash($data['password'], PASSWORD_BCRYPT));
        $this->db->bind('name', $data['name']);
        $this->db->bind('role', $data['role']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delUser($id)
    {
        $this->stmt = 'DELETE FROM ' . $this->table . ' WHERE id_user=:id';
        $this->db->query($this->stmt);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getUser($id)
    {
        $this->stmt = 'SELECT * FROM ' . $this->table . ' WHERE id_user=:id';
        $this->db->query($this->stmt);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function updtUser($data)
    {
        $this->stmt = 'UPDATE ' . $this->table . ' SET username = :user,password=:pass,name=:name,role=:role WHERE id_user=:id';
        $this->db->query($this->stmt);
        $this->db->bind('user', $data['username']);
        $this->db->bind('name', $data['name']);
        $this->db->bind('pass', password_hash($data['password'], PASSWORD_BCRYPT));
        $this->db->bind('role', $data['role']);
        $this->db->bind('id', $data['id_user']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function updtAvatar($data, $file)
    {
        try {
            $this->stmt = 'UPDATE ' . $this->table . ' SET gambar=:gambar WHERE id_user=:id';
            $this->db->query($this->stmt);
            $this->db->bind('gambar', $file['profile']['name']);
            $this->db->bind('id', $data['id_user']);
            $dirTo = 'img/avatars/';
            $dirFrom = $file['profile']['tmp_name'];
            $file_name = basename($file['profile']['name']);
            $target_file = $dirTo . $file_name;

            // Check if the file has been successfully uploaded
            if (!move_uploaded_file($dirFrom, $target_file)) {
                // Handle the error, maybe log it or show an error message
                return false;
            }
            $this->db->execute();
            return $this->db->rowCount();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updtPassword($data)
    {
        try {
            $this->stmt = 'UPDATE ' . $this->table . ' SET password=:pass WHERE id_user=:id';
            $this->db->query($this->stmt);
            $this->db->bind('pass', password_hash($data['new'], PASSWORD_BCRYPT));
            $this->db->bind('id', $data['id']);
            $this->db->execute();
            return $this->db->rowCount();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
