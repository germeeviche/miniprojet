<?php

/**************************************************************************
* Source File	:  Enseignement.php
* Author                   :  NGUIMNANG
* Project name         :  Non enregistr�* Created                 :  22/12/2014
* Modified   	:  22/12/2014
* Description	:  Definition of the class Enseignement
**************************************************************************/




class enseignementModel		
{
	//Attributes
		
	var $code; // type :string
        var $matricule; // type:string
	var $idens; // type : string
	var $type; // type : string
	var $datedeb; // type : string
	var $datefin; // type : string
	var $nbseaprevu; // type : int
	var $semestre; // type : int

	//Operations
	 	
	   public function enregistrer($idens, $code, $matricule, $type, $datedeb, $datefin, $nbseaprevu, $semestre) {

        $sql = "INSERT INTO enseignement values(:idens,:code,:matricule,:type,:datedeb,:datefin,:nbseaprevu,:semestre)";
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);

        $req->bindValue(':idens', $idens);
        $req->bindValue(':code', $code);
        $req->bindValue(':matricule', $matricule);
        $req->bindValue(':type', $type);
        $req->bindValue(':datedeb', $datedeb);
        $req->bindValue(':datefin', $datefin);
        $req->bindValue(':nbseaprevu', $nbseaprevu);
        $req->bindValue(':semestre', $semestre);

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
                $sql = "select * from enseignement where $endquery";
            } else {
                $sql = "select * from enseignement";
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
                $sql = "select $startquery from enseignement where $endquery";
            } else {
                $sql = "select $startquery from enseignement";
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
    public function editer($idens, $code, $matricule, $type, $datedeb, $datefin, $nbseaprevu, $semestre){
         $sql = "update enseignement set code=:code, matricule=:matricule, type=:type ,datedeb=:datedeb ,datefin=:datefin ,nbseaprevu=:nbseaprevu, semestre=:semestre where idens=:idens";
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);

       $req->bindValue(':idens', $idens);
        $req->bindValue(':code', $code);
        $req->bindValue(':matricule', $matricule);
        $req->bindValue(':type', $type);
        $req->bindValue(':datedeb', $datedeb);
        $req->bindValue(':datefin', $datefin);
        $req->bindValue(':nbseaprevu', $nbseaprevu);
        $req->bindValue(':semestre', $semestre);

        try {

            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur SQL " . $ex->getMessage());
        }
    }
    
    public function supprimer($idens){
           $sql = "delete from enseignement where idens=:idens";
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);

        $req->bindValue(':idens', $idens);
       

        try {

            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur SQL " . $ex->getMessage());
        }
    }
    
	

} // End Class Enseignement


?>

