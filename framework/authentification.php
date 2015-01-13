<?php

defined('__FRAMEWORK3IL__') or die('Acces interdit');

class Authentification {

    protected $authTable;
    protected $authColId;
    protected $authColLogin;
    protected $authColMotDePasse;
    protected $authColSel;
    protected $utilisateur = null;
    private static $_instance = null;

    const SESSION_KEY = 'framework3il.authentification';
    /**
     * Constructeur de Authentification
     * @param string $authTable
     * @param id $authColId
     * @param string $authColLogin
     * @param string $authColMotDePasse
     * @param string $authColSel
     */
    private function __construct($authTable, $authColId, $authColLogin, $authColMotDePasse, $authColSel) {
        $this->authTable = $authTable;
        $this->authColId = $authColId;
        $this->authColLogin = $authColLogin;
        $this->authColMotDePasse = $authColMotDePasse;
        $this->authColSel = $authColSel;
    }
    /**
     * retourne une instance d'authentification
     * @param type $authTable
     * @param type $authColId
     * @param type $authColLogin
     * @param type $authColMotDePasse
     * @param type $authColSel
     * @return Authentification
     */
    public static function getInstance($authTable = null, $authColId = null, $authColLogin = null, $authColMotDePasse = null, $authColSel = null) {
        if (is_null(self::$_instance)) {
            self::$_instance = new Authentification($authTable, $authColId, $authColLogin, $authColMotDePasse, $authColSel);
        }
        return self::$_instance;
    }

    /**
     * authentifie un utilisateur 
     * @param string $login
     * @param string $motDePasse
     * @return boolean
     */
    public static function authentifier($login, $motDePasse) {
        $base = Application::getDB();
        $authColId=Authentification::getInstance()->authColId;
        $authColSel=Authentification::getInstance()->authColSel;
        $authColMotDePasse=Authentification::getInstance()->authColMotDePasse;
        $authTable=Authentification::getInstance()->authTable;
        $authColLogin=Authentification::getInstance()->authColLogin;
        $sql = "select $authColId,$authColSel,$authColMotDePasse from $authTable where $authColLogin=:login";
        echo "$sql  <br/>";
        $req = $base->prepare($sql);
        $req->bindValue(':login', $login);
        try {

            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur SQL " . $ex->getMessage());
        }
        $data = $req->fetch();
       
        if (!isset($data)) {
            
            return false;
        } else {
            
            $mdptest=Authentification::getInstance()->encoder($motDePasse,$data["$authColSel"]);
            $mdp=$data["$authColMotDePasse"];
          
            if($mdp!=$mdptest){
                return false;
            }
            else{
                $_SESSION["$authColId"]=$data["$authColId"];
                return true;
            }
        }
    }
    /**
     * charge les donnees d'un utilisateur
     */
    public function chargerUtilisateur() {
         $base = Application::getDB();
         $authColId=Authentification::getInstance()->authColId;
        $authColSel=Authentification::getInstance()->authColSel;
        $authColMotDePasse=Authentification::getInstance()->authColMotDePasse;
        $authTable=Authentification::getInstance()->authTable;
        $authColLogin=Authentification::getInstance()->authColLogin;
          if(!isset( $_SESSION["$authColId"])) {
              die ("Utilisateur non connectee");
          }
          else{
              $id=$_SESSION["$authColId"];
          }
        $sql = "select * from $authTable where  $authColId=:id";
       
        $req = $base->prepare($sql);
         $req->bindValue(':id', $id);
          try {

            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur SQL " . $ex->getMessage());
        }
        $data = $req->fetch(PDO::FETCH_ASSOC);
        unset($data["$authColMotDePasse"]);
        Authentification::getInstance()->utilisateur=$data;
    }

    public static function deconnecter() {
          Authentification::getInstance()->utilisateur=null;
          unset($_SESSION["id"]);
          session_destroy();
    }

    /**
     * teste si un utillisateue est connectee
     * @return boolean
     */
    public static function estConnecte() {
        $authColId=Authentification::getInstance()->authColId;
        return isset($_SESSION["$authColId"]);

    }

    /**
     * reourne l'utilisateur courant 
     * @return Utilisateur
     */
    public static function getUtilisateur() {
              if(is_null(Authentification::getInstance()->utilisateur)){
                  Authentification::getInstance()->chargerUtilisateur();
              }
              return Authentification::getInstance()->utilisateur;
    }

    /**
     * retourne l'id de l'utilisateur
     * @return int
     */
    public static function getUtilisateurId() {
              if(!Authentification::getInstance()->estConnecte()){
                  die("Utiisateur non connecter");
              }
              else{
                  return $_SESSION["id"];
              }
    }

    /**
     * encode un mot de passe en sha256 avec le sel $sel
     * @param string $motDePasse
     * @param string $sel
     * @return string
     */
    public static function encoder($motDePasse, $sel) {
        return hash("sha256", $motDePasse . hash("sha256", $sel));
    }

}
