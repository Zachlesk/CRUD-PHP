<?php

require_once("../config/conectar.php");
require_once("../config/db.php");




class RegistroUser extends Conectar {
    
    private $id;
    private $idCamper;
    private $username;
    private $email;
    private $password;

    public function __construct($id=0, $idCamper=0, $username="", $email="", $password="", $dbCnx="") {
        $this->id = $id;
        $this->idCamper = $idCamper;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        parent::__construct($dbCnx);
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getIdCamper() {
        return $this->idCamper;
    }
    public function setIdCamper($idCamper) {
        $this->idCamper = $idCamper;
    }
    public function getUsername() {
        return $this->username;
    }
    public function setUsername($username) {
        $this->username = $username;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password = $password;
    }

public function insertData () {
            try { 
                $stm = $this-> dbCnx -> prepare("INSERT INTO users (idCamper,username,email,password) VALUES (?,?,?,?)");
                $stm -> execute ([$this->idCamper, $this->username, $this->email, md5($this->password)]);
    } catch (Exception $e) {
    return $e->getMessage();
    }
  
    }   

    public function obtainAll() {
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM users");
            $stm -> execute();
            return $stm -> fetchAll();

        } catch (Exception $e) {
            return e->getMessage();
        }
    }

    public function delete() {
        try {
            $stm = $this->dbCnx -> prepare("DELETE FROM users WHERE id=?");
            $stm -> execute([$this->id]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectOne() {
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM users WHERE id=?");
            $stm -> execute([$this->id]);
            return $stm -> fetchAll();
            
        } catch (Exception $e) {
            return 
            $e->getMessage();
        }
    }

    public function update() {

        try {
            $stm = $this->dbCnx -> prepare("UPDATE users SET idCamper = ? campers , username = ?, email = ?, password = ? WHERE id=?");
            $stm -> execute([$this->idCamper, $this->campers, $this->username, $this->email, $this->id]);

        } catch (Exception $e) {
            return $e->getMessage();
        }

    }
}





?>