<?php

/**************************************************************************
* Source File	:  Enseignant.php
* Author                   :  Mbembe Germaine
* Project name         : miniprojet Documents Administratifs                :  22/12/2014
* Modified   	:  22/12/2014
* Description	:  Definition of the class Enseignant
**************************************************************************/




class enseignantModel 			
{
	//Attributes
		
	 
	var $matricule; // type : string
	var $nom; // type : string
	var $prenom; // type : string
	var $tel; // type : string
	var $email; // type : string
	var $datent; // type : string
	var $login; // type : string
	var $mdpasse; // type : string

	//Operations
        public function loginExiste($login){
           $sql = "select count(*) from enseignant where login=:login";
            
            $req = $this->db->prepare($sql);
            $req->bindValue(':login',$login);  
            
            try {
                $req->execute();
                
            } catch (PDOException $ex) {
                throw new Erreur("Erreur SQL ".$ex->getMessage());
            }
            $nombre=$req->fetchColumn();
             echo $nombre;
            $nombre= filter_var($nombre,FILTER_SANITIZE_NUMBER_INT);
            echo $nombre;
            if($nombre>0){
                return true;
            }
            else{
                return false;
            }
        }
        
    public function enregistrer($matricule,$nom,$prenom,$tel,$email,$login,$mdpasse) {

        $datent= date("Y-m-d H:i:s");  
            $sql = "INSERT INTO enseignant values(:matricule,:nom,:prenom,:tel,:email,:datent,:login,:mdpasse)";
            //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
            $req = $this->db->prepare($sql);
            
            $req->bindValue(':matricule',$matricule);
            $req->bindValue(':nom',$nom);  
             $req->bindValue(':prenom',$prenom);
             $req->bindValue(':login',$login);
             $req->bindValue(':mdpasse',Authentification::encoder($mdpasse,$datent));
             $req->bindValue(':email',$email);
             $req->bindValue(':tel',$tel);
             $req->bindValue(':datent',$datent);
            try {
                
                $req->execute();
                  
            } catch (PDOException $ex) {
                die ("Erreur SQL ".$ex->getMessage());
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
                $sql = "select * from enseignant where $endquery";
            } else {
                $sql = "select * from enseignant";
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
                $sql = "select $startquery from enseignant where $endquery";
            } else {
                $sql = "select $startquery from enseignant";
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
  public function editer($matricule,$nom,$prenom,$tel,$email,$login,$mdpasse){
       $datent= date("Y-m-d H:i:s"); 
         $sql = "update enseignant set  nom=:nom, prenom=:prenom, tel=:tel, email=:email, login=:login, mdpasse=:mdpasse where matricule=:matricule";
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);

             $req->bindValue(':matricule',$matricule);
             $req->bindValue(':nom',$nom);  
             $req->bindValue(':prenom',$prenom);
             $req->bindValue(':login',$login);
             $req->bindValue(':mdpasse',Authentification::encoder($mdpasse,$datent));
             $req->bindValue(':email',$email);
             $req->bindValue(':tel',$tel);

        try {

            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur SQL " . $ex->getMessage());
        }
    }
    
    public function supprimer($matricule){
           $sql = "delete from enseignant where matricule=:matricule";
        //$test="INSERT INTO utilisateurs values(:nom,:prenom,:login,:motdepasse,:email,:formation)";
        $req = $this->db->prepare($sql);

        $req->bindValue(':matricule', $matricule);
       

        try {

            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur SQL " . $ex->getMessage());
        }
    }
    

} // End Class Enseignant


?>

