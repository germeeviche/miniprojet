<?php

/**************************************************************************
* Source File	:  FM.php
* Author                   :  Germaine Mbembe
* Project name         :  miniprojet Documents Administratifs             :  22/12/2014
* Modified   	:  22/12/2014
* Description	:  Definition of the class FM
**************************************************************************/




class ficheMatiereModel 			
{
	//Attributes
		
	 
	var $idmat; // type : string
        var $code; //type : string
	var $datemaj; // type : string
	var $daterel; // type : string

	//Operations
	 	
	  public function enregistrer($idmat, $code, $datemaj, $daterel) {

        $sql = "INSERT INTO fm values(:idmat,:code,:datemaj,:daterel)";
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);

        $req->bindValue(':idmat', $idmat);
        $req->bindValue(':code', $code);
        $req->bindValue(':datemaj', $datemaj);
        $req->bindValue(':daterel', $daterel);

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
                $sql = "select * from fm where $endquery";
            } else {
                $sql = "select * from fm";
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
                $sql = "select $startquery from fm where $endquery";
            } else {
                $sql = "select $startquery from fm";
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
    public function editer($idmat, $code, $datemaj, $daterel){
         $sql = "update fm set code=:code ,datemaj=:datemaj ,daterel=:daterel where idmat=:idmat";
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);

         $req->bindValue(':idmat', $idmat);
        $req->bindValue(':code', $code);
        $req->bindValue(':datemaj', $datemaj);
        $req->bindValue(':daterel', $daterel);

        try {

            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur SQL " . $ex->getMessage());
        }
    }
    
    public function supprimer($idmat){
           $sql = "delete from fm where idmat=:idmat";
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);

        $req->bindValue(':idmat', $idmat);
       

        try {

            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur SQL " . $ex->getMessage());
        }
    }
    
 
	

} // End Class FM


?>

