<?php
    class Conjoint
    {
        private $num_Pension;
        private $NomConjoint;
        private $PrenomConjoint;
        private $DatenaisConjoint; 

        public function __construct($num_Pension, $NomConjoint, $PrenomConjoint,  $DatenaisConjoint)
        {
            $this->num_Pension = $num_Pension;
            $this->NomConjoint = $NomConjoint;
            $this->PrenomConjoint = $PrenomConjoint;
            $this->DatenaisConjoint = $DatenaisConjoint;
        }

        public function AjoutConjoint()
        {
            include('../Model/MySQL.php');

            //Preparer les requetes
            $sql = "INSERT INTO conjoint (num_Pension,NomConjoint,PrenomConjoint,DatenaisConjoint) VALUE (:num_Pension, :NomConjoint, :PrenomConjoint, :DatenaisConjoint)";
            $sth = $db->prepare($sql);
            return $sth->execute(['num_Pension' => $this->num_Pension, 'NomConjoint' => $this->NomConjoint, 'PrenomConjoint' => $this->PrenomConjoint, 'DatenaisConjoint' => $this->DatenaisConjoint]);
        }   

        static public function showConjoint()
        {
            include('../Model/MySQL.php');
            $mysql = "SELECT * FROM conjoint";

            return $db->query($mysql);
        }
    }

?>