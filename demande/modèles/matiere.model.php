<?php

/**************************************************************************
* Source File	:  Matiere.php
* Author                   :  NGUIMNANG
* Project name         :  Non enregistr�* Created                 :  22/12/2014
* Modified   	:  22/12/2014
* Description	:  Definition of the class Matiere
**************************************************************************/




class matiereModel			
{
	//Attributes
		
	 
	var $code; // type : string
        var $libdomaine; //type : string
        var $matricule; // type : string
	var $libmat; // type : string
	var $credit; // type : int
	var $objectif; // type : string
	var $programme; // type : string
	var $prerequis; // type : string
	var $contraintes; // type : string
	var $libsection; // type : string
	var $annee; // type : string

	//Operations
	 
        
    public function enregistrer($code, $libdomaine, $matricule, $libmat, $credit, $objectif, $programme, $prerequis, $contraintes, $libsection, $annee) {

        $sql = "INSERT INTO matiere values(:code,:libdomaine,:matricule,:libmat,:credit,:objectif,:programme,:prerequis,:contraintes,:libsection,:annee)";
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);

        $req->bindValue(':code', $code);
        $req->bindValue(':libdomaine', $libdomaine);
        $req->bindValue(':matricule', $matricule);
        $req->bindValue(':libmat', $libmat);
        $req->bindValue(':credit', $credit);
        $req->bindValue(':objectif', $objectif);
        $req->bindValue(':programme', $programme);
        $req->bindValue(':prerequis', $prerequis);
        $req->bindValue(':contraintes', $contraintes);
        $req->bindValue(':libsection', $libsection);
        $req->bindValue(':annee', $annee);

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
                $sql = "select * from matiere where $endquery";
            } else {
                $sql = "select * from matiere";
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
                $sql = "select $startquery from matiere where $endquery";
            } else {
                $sql = "select $startquery from matiere";
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
    public function editer($code, $libdomaine, $matricule, $libmat, $credit, $objectif, $programme, $prerequis, $contraintes, $libsection, $annee){
         $sql = "update cre set libdomaine=:libdomaine,matricule=:matricule,libmat=:libmat,credit=:credit,objectif=:objectif,programme=:programme,prerequis=:prerequis,contraintes=:contraintes,libsection=:libsection,annee=:annee where code=:code";
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);

        
        $req->bindValue(':code', $code);
        $req->bindValue(':libdomaine', $libdomaine);
        $req->bindValue(':matricule', $matricule);
        $req->bindValue(':libmat', $libmat);
        $req->bindValue(':credit', $credit);
        $req->bindValue(':objectif', $objectif);
        $req->bindValue(':programme', $programme);
        $req->bindValue(':prerequis', $prerequis);
        $req->bindValue(':contraintes', $contraintes);
        $req->bindValue(':libsection', $libsection);
        $req->bindValue(':annee', $annee);

        try {

            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur SQL " . $ex->getMessage());
        }
    }
    
    public function supprimer($code){
           $sql = "delete from matiere where code=:code";
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);

        $req->bindValue(':code', $code);
       

        try {

            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur SQL " . $ex->getMessage());
        }
    }
    

	 
	

} // End Class Matiere


?>

