<?php

require_once("db.php");

class Config{
    private $id;
    private $nombres;
    private $direccion;
    private $logros;
    private $ser;
    private $review;
    private $skills;
    private $ingles;
    private $asistencia;
    protected $dbCnx;

    public function __construct($id= 0, $nombres= "", $direccion= "", $logros= "", $ser= "", $review= "", $skills= "", $ingles= "", $asistencia= "") {
        
        $this->id = $id;
        $this->nombres = $nombres;
        $this->direccion = $direccion;
        $this->logros = $logros;
        $this->ser = $ser;
        $this->review = $review;
        $this->skills = $skills;
        $this->ingles = $ingles;
        $this->asistencia = $asistencia;

        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    } 

        public function setId($id) {
            $this->id = $id;
        }

        public function getId() {
            return $this->id = $id;
        }

        public function setNombres($nombres) {
            $this->nombres = $nombres;
        }

        public function getNombres() {
            return $this->nombres;
        }

        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }

        public function getDireccion() {
            return $this->direccion;
        }

        public function setLogros($logros) {
            $this->logros = $logros;
        }

        public function getLogros() {
            return $this->logros;
        }

        public function setSer($ser) {
            $this->ser = $ser;
        }

        public function getSer() {
            return $this->ser = $ser;
        }

        public function setReview($review) {
            $this->review = $review;
        }

        public function getReview() { 
            return $this->ingles;
        }
          

        public function setSkills($skills) {
            $this->skills= $skills;
        }

        public function getSkills() {
            return $this->skills;
        }

        public function setIngles($ingles) {
            $this->ingles = $ingles;
        }

        public function getIngles() {
            return $this->ingles;
        }

        public function setAsistencia($asistencia) {
            $this->asistencia = $asistencia;
        }

        public function getAsistencia() {
            return $this->asistencia;
        }


        public function insertData () {
            try { 
                $stm = $this->dbCnx -> prepare("INSERT INTO campers (nombres,direccion,logros,ser,review,skills,ingles,asistencia) VALUES (?,?,?,?,?,?,?,?)");
                $stm -> execute ([$this->nombres, $this->direccion, $this->logros, $this->ser, $this->review, $this->skills, $this->ingles, $this->asistencia]);
    } catch (Exception $e) {
    return $e->getMessage();
    }
  
    }   

    public function obtainAll() {
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM campers");
            $stm -> execute();
            return $stm -> fetchAll();

        } catch (Exception $e) {
            return e->getMessage();
        }
    }

    public function delete() {
        try {
            $stm = $this->dbCnx -> prepare("DELETE FROM campers WHERE id=?");
            $stm -> execute([$this->id]);
            return $stm -> fetchAll();
            echo "<script> alert('Registro eliminado');document.location='estudiantes.php'</script>'";
        } catch (Exception $e) {
            return e->getMessage();
        }
    }


    }

?>