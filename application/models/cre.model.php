<?php

/* * ************************************************************************
 * Source File	:  CRE.php
 * Author                   :  Mbembe Germaine
 * Project name         :  miniprojet Documents Administratifs               :  22/12/2014
 * Modified   	:  22/12/2014
 * Description	:  Definition of the class CRE
 * ************************************************************************ */

class creModel {

    //Attributes


    var $id; // type : string
    var $idens; // type : string
    var $comportement; // type : string
    var $duree; // type : string
    var $salle; // type : string
    var $materiel; // type : string

    //Operations

    public function enregistrer($id, $idens, $comportement, $duree, $salle, $materiel) {

        $sql = "INSERT INTO cre values(:id,:idens,:comportement,:duree,:salle,:materiel)";
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);

        $req->bindValue(':id', $id);
        $req->bindValue(':idens', $idens);
        $req->bindValue(':comportement', $comportement);
        $req->bindValue(':duree', $duree);
        $req->bindValue(':salle', $salle);
        $req->bindValue(':materiel', $materiel);

        try {

            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur SQL " . $ex->getMessage());
        }
    }

    public function lister($params = NULL, $field = NULL) {

        if (is_null($field)) {
            if (!is_null($params)) {
                $endquery = "";
                foreach ($params as $key => $value) {

                    $endquery.="$key=$value and ";
                }
                substr($endquery, 0, -4);
                $sql = "select * from cre where $endquery";
            } else {
                $sql = "select * from cre";
            }
        } else {
            $startquery = "";
            foreach ($field as $val) {

                $startquery.="$val,";
            }
            substr($startquery, 0, -1);
            if (!is_null($params)) {
                $endquery = "";
                foreach ($params as $key => $value) {

                    $endquery.="$key=$value and ";
                }
                substr($endquery, 0, -4);
                $sql = "select $startquery from cre where $endquery";
            } else {
                $sql = "select $startquery from cre";
            }
        }
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);
        try {

            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur SQL " . $ex->getMessage());
        }
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public function editer($id, $idens, $comportement, $duree, $salle, $materiel){
         $sql = "update cre set idens=:idens, comportement=:comportement ,duree=:duree ,salle=:salle ,materiel=:materiel where id=:id";
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);

        $req->bindValue(':id', $id);
        $req->bindValue(':idens', $idens);
        $req->bindValue(':comportement', $comportement);
        $req->bindValue(':duree', $duree);
        $req->bindValue(':salle', $salle);
        $req->bindValue(':materiel', $materiel);

        try {

            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur SQL " . $ex->getMessage());
        }
    }
    
    public function supprimer($id){
           $sql = "delete from cre where id=:id";
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);

        $req->bindValue(':id', $id);
       

        try {

            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur SQL " . $ex->getMessage());
        }
    }
    

}

// End Class CRE
?>



