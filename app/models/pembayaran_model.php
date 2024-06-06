<?php 
class Pembayaran_model
{
    private $table = 'bills';
    private $db;
    private $dbh;
    private $stmt;

    public function __construct()
    {
        $this->db  = new Database;
    }
    public function getAllBills(){
        $this->stmt = 'SELECT bills.*, students.*,semesters.*,classes.* FROM '.$this->table.' JOIN students on bills.student_id=students.nis JOIN semesters on bills.semester_id = semesters.id_semester JOIN classes on students.class_id = classes.id ORDER BY student_id';
        $this->db->query($this->stmt);
        return $this->db->result();
    }
}