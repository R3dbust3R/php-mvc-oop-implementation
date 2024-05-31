<?php


class Users_model {
    private $_host    = 'localhost';
    private $_db_name = 'user_manager_oop_mvc';
    private $_user    = 'root';
    private $_pass    = '';
    

    public function db_connect() {
        return new PDO(
            'mysql:host='.$this->_host.';dbname='.$this->_db_name, 
            $this->_user, 
            $this->_pass);
    }

    public function get_db_users() {
        $stmt = $this->db_connect()->query('SELECT * FROM users ORDER BY id DESC limit 10');
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_user_by_id($id) {
        $stmt = $this->db_connect()->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function get_user_email($id) {
        $stmt = $this->db_connect()->prepare('SELECT email FROM users WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function get_roles() {
        $stmt = $this->db_connect()->query('SELECT DISTINCT role FROM users');
        return $stmt->fetchAll(PDO::FETCH_OBJ); 
    }

    public function model_insert_user($name, $phone, $email, $birth_date, $userrole) {
        $stmt = $this->db_connect()
        ->prepare('INSERT INTO users (name, phone, email, birth_date, role) VALUES (?,?,?,?,?)');
        $insertion_result = $stmt->execute([$name, $phone, $email, $birth_date, $userrole]);
        if ($insertion_result) { return true; }
    }

    public function check_email_existance($email) {
        $stmt = $this->db_connect()->prepare('SELECT email FROM users WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function model_destroy_user($id) {
        $stmt = $this->db_connect()->prepare('DELETE FROM users WHERE id = ?');
        if ($stmt->execute([$id])) { return true; }
    }

    public function model_update_user($id, $name, $phone, $email, $birth_date, $userrole) {
        $stmt = $this->db_connect()
        ->prepare('UPDATE users SET name = ?, phone = ?, email = ?, birth_date = ?, role = ? WHERE id = ?');
        if ($stmt->execute([$name, $phone, $email, $birth_date, $userrole, $id])) { return true; }
    }


}