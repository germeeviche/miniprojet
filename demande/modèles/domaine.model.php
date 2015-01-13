
<?php

/**************************************************************************
* Source File	:  Domaine.php
* Author                   :  Mbembe Germaine
* Project name         : miniprojet Documents Administratifs                 :  22/12/2014
* Modified   	:  22/12/2014
* Description	:  Definition of the class Domaine
**************************************************************************/




class domaineModel
{
	//Attributes
		
	 
	var $libdomaine; // type : string
        var $matricule; //type : string
	var $annee; // type : string
      
	//Operations
	 	
	  public function enregistrer($libdomaine, $matricule, $annee) {

        $sql = "INSERT INTO domaine values(:libdomaine,:matricule, :annee)";
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);

        $req->bindValue(':libdomaine', $libdomaine);
        $req->bindValue(':matricule', $matricule);
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
                $sql = "select * from domaine where $endquery";
            } else {
                $sql = "select * from domaine";
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
                $sql = "select $startquery from domaine where $endquery";
            } else {
                $sql = "select $startquery from domaine";
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
    public function editer($libdomaine,$matricule, $annee){
         $sql = "update domaine  set annee=:annee, matricule=:matricule where libdomaine=:libdomaine";
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);

         $req->bindValue(':libdomaine', $libdomaine);
         $req->bindValue(':matricule', $matricule);
        $req->bindValue(':annee', $annee);;

        try {

            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur SQL " . $ex->getMessage());
        }
    }
    
    public function supprimer($libdomaine){
           $sql = "delete from domaine where libdomaine=:libdomaine";
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);

        $req->bindValue(':libdomaine', $libdomaine);
       

        try {

            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur SQL " . $ex->getMessage());
        }
    }
    
	

} // End Class Domaine


?>


