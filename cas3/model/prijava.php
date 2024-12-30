<?php 
    class Prijava {

        public $id;
        public $predmet;
        public $katedra;
        public $sala;
        public $datum;

        public function __construct($id=null, $predmet=null, $katedra=null, $sala=null, $datum=null) {
            $this->id = $id;
            $this->predmet = $predmet;
            $this->katedra = $katedra;
            $this->sala = $sala;
            $this->datum = $datum;
        }

        public static function getAll(mysqli $conn) {

            $query = "SELECT * FROM prijave";

            return $conn->query($query);
        }

        public static function getByID($id, mysqli $conn) {
            $query = "SELECT * FROM prijave WHERE id = $id";
            //$rezultat = $conn->query($query);
            return $conn->query($query)->fetch_assoc();
        }

        public function deleteByID(mysqli $conn) {
            $query = "DELETE FROM prijave WHERE id=$this->id";
            return $conn->query($query);
        }

        public static function add(Prijava $p, mysqli $conn) {
            $query = "INSERT INTO prijave (predmet, katedra, sala, datum)
                    VALUES('$p->predmet', '$p->katedra', '$p->sala', '$p->datum')";
        
            return $conn->query($query);
        }
    }

?>