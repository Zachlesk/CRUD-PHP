<?php

require_once("../config/conectar.php");
require_once("../config/db.php");
require_once("../Login/LoginUser.php");




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


    public function checkUser($email) {
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE email = '$email'");
            $stm->execute();
            if($stm->fetchColumn()){
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

public function insertData () {
            try { 
                $stm = $this-> dbCnx -> prepare("INSERT INTO users (idCamper, username,email,password) VALUES (?,?,?)");
                $stm -> execute ([$this->idCamper, $this->username, $this->email, md5($this->password)]);

                $login = new LoginUser;

                $login-> setEmail($_POST["email"]);
                $login-> setPassword($_POST["password"]);

                $success = $login->login();


    } catch (Exception $e) {
    return $e->getMessage();
    }
  
    }   

    
}





?>