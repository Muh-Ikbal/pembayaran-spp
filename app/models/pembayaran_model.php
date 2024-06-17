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
    public function getAllBills()
    {
        $where = '';
        $bind_values = []; // Array untuk menyimpan nilai parameter yang akan diikat

        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $where = 'WHERE nis LIKE :keyword OR name LIKE :keyword'; // Perbaiki typo di sini (:keyword)
            $bind_values[':keyword'] = '%' . $keyword . '%'; // Menyimpan nilai parameter
        }

        $this->stmt = 'SELECT bills.*, students.*, semesters.*, classes.* FROM ' . $this->table . ' JOIN students on bills.student_id=students.nis JOIN semesters on bills.semester_id = semesters.id_semester JOIN classes on students.class_id = classes.id ' . $where . ' ORDER BY student_id';
        $this->db->query($this->stmt);

        // Bind nilai parameter yang disimpan di $bind_values
        foreach ($bind_values as $key => $value) {
            $this->db->bind($key, $value);
        }

        return $this->db->result();
    }



    public function checkExistingPayment($student_id, $semester_id)
    {
        $this->db->query('SELECT * FROM bills WHERE student_id =:student_id AND semester_id =:semester_id');
        $this->db->bind('student_id', $student_id);
        $this->db->bind('semester_id', $semester_id);
        $this->db->execute(); // Jalankan query
        return $this->db->rowCount() > 0; // Periksa apakah ada pembayaran yang sudah ada
    }

    public function addPembayaran($data)
    {
        try {
            // Define the SQL statement
            $this->stmt = 'INSERT INTO ' . $this->table . ' 
            (student_id, teacher_id, semester_id, amount_paid, payment_date, payment_type, transaction_status, va_number, bank, order_id) 
            VALUES (:student_id, :teacher_id, :semester_id, :amount_paid, :payment_date, :payment_type, :transaction_status, :va_number, :bank, :order_id)';

            // Prepare the SQL query
            $this->db->query($this->stmt);

            // Bind parameters
            $this->db->bind(':student_id', $data['student_id']);
            $this->db->bind(':teacher_id', $data['id_teacher']);
            $this->db->bind(':semester_id', $data['semester']);
            $this->db->bind(':amount_paid', $data['amount_paid']);
            $this->db->bind(':payment_date', $data['payment_date']);
            $this->db->bind(':payment_type', $data['payment_type']);
            $this->db->bind(':transaction_status', $data['transaction_status']);
            $this->db->bind(':va_number', $data['va_number']);
            $this->db->bind(':bank', $data['bank']);
            $this->db->bind(':order_id', $data['order_id']);

            // Execute the statement
            $this->db->execute();

            // Return the number of affected rows
            return $this->db->rowCount();
        } catch (Exception $e) {
            // Log the error message
            error_log("Error in addPembayaran: " . $e->getMessage());
            return $e->getMessage();
        }
    }


    public function getAllBillsByIdTeacher($id)
    {
        $where = '';
        $bind_values = []; // Array untuk menyimpan nilai parameter yang akan diikat

        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $where = ' AND (nis LIKE :keyword OR name LIKE :keyword)'; // Tambahkan spasi setelah WHERE
            $bind_values[':keyword'] = '%' . $keyword . '%'; // Menyimpan nilai parameter
        }
        $this->stmt = 'SELECT bills.*, students.*, semesters.*, classes.* FROM ' . $this->table . ' JOIN students on bills.student_id=students.nis JOIN semesters on bills.semester_id = semesters.id_semester JOIN classes on students.class_id = classes.id WHERE teacher_id = :id ' . $where . ' ORDER BY student_id';
        $this->db->query($this->stmt);
        $this->db->bind(':id', $id); // Pastikan untuk menggunakan bind dengan parameter ':id'
        foreach ($bind_values as $key => $value) {
            $this->db->bind($key, $value);
        }
        return $this->db->result();
    }

    public function getAllBillsByNis($nis)
    {
        $this->stmt = 'SELECT bills.*, students.*,semesters.*,classes.* FROM ' . $this->table . ' JOIN students on bills.student_id=students.nis JOIN semesters on bills.semester_id = semesters.id_semester JOIN classes on students.class_id = classes.id WHERE student_id=:id ORDER BY student_id';
        $this->db->query($this->stmt);
        $this->db->bind('id', $nis);
        return $this->db->result();
    }
    public function getAllBillsById($id)
    {
        $this->stmt = 'SELECT bills.*, students.*,semesters.*,classes.* FROM ' . $this->table . ' JOIN students on bills.student_id=students.nis JOIN semesters on bills.semester_id = semesters.id_semester JOIN classes on students.class_id = classes.id WHERE id_pembayaran=:id ORDER BY student_id';
        $this->db->query($this->stmt);
        $this->db->bind('id', $id);
        return $this->db->single();
    }


    public function cekPembayaran($id_pembayaran)
    {
        try {
            $this->stmt = 'SELECT * FROM ' . $this->table . ' WHERE id_pembayaran=:id';
            $this->db->query($this->stmt);
            $this->db->bind('id',$id_pembayaran);
            return $this->db->single();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        // return false;
    }
    public function updateStatus($id_pembayaran,$status){
        try{
        $this->stmt = 'UPDATE '.$this->table . ' SET  transaction_status = :status WHERE id_pembayaran =:id';
        $this->db->query($this->stmt);
        $this->db->bind('status',$status);
        $this->db->bind('id',$id_pembayaran);
        $this->db->execute();
        return $this->db->rowCount();
    }catch(Exception $e){
        return $e->getMessage();
    }
    }
}
