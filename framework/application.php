<?php

session_start();
define('__FRAMEWORK3IL__', '');
require_once 'configuration.php';
require_once 'helper/http.helper.php';
require_once 'helper/html.helper.php';
require_once 'helper/form.helper.php';
require_once 'controller.php';
require_once 'erreur.php';
require_once 'page.php';
require_once 'model.php';
require_once 'authentification.php';
require_once 'message.php';
require_once 'datagrid.php';
require_once 'dataset.php';
class Application {

    private $configuration = null;
    private static $_instance = null;
    private $base = null;
    protected $controleurParDefaut;
    private $controlleurCourant;
    private $actionCourante;
    private $cheminAbsolu;
    /**
     * constructeur de la classe
     * @param string $fichierIni
     */
    private function __construct($fichierIni) {
        $this->configuration = Configuration::getInstance($fichierIni);
        try {

            $host = $this->configuration->db_hostname;
            $dbname = $this->configuration->db_database;
            $username = $this->configuration->db_username;
            $pass = $this->configuration->db_password;
            $this->base = new PDO("mysql:host=$host;dbname=$dbname", $username, $pass);
        } catch (Exception $ex) {
            die("Erreur configuration " . $ex->getMessage());
        }

        $this->base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->cheminAbsolu = realpath('.');
    }

    /**
     * retourne le controleur de l'application
     * @return Controller
     */
    public function getControleurParDefaut() {
        return $this->controleurParDefaut;
    }
    
    /**
     * definit le controleur par defaut de l'application
     * @param Controller $controleurParDefaut
     * @throws Erreur
     */
    public function setControleurParDefaut($controleurParDefaut) {
        $chemin = 'application/controllers/';
        $fichierController = $chemin . $controleurParDefaut . '.controller.php';

        if (!is_readable($fichierController))
            throw new Erreur('Pas lisible');
        require_once $fichierController;
        $class = $controleurParDefaut . 'Controller';
        if (!class_exists($class))
            throw new Erreur('Classe inexistante');
        $this->controleurParDefaut = $controleurParDefaut;
    }
    /**
     * retourne le controleur courant(qui est en cours d'utilisation) de l'application
     * @return Controller
     */
    public static function getControlleurCourant() {
        return Application::getInstance()->controlleurCourant;
    }
    public function setControlleurCourant($controlleurCourant) {
        $this->controlleurCourant = $controlleurCourant;
        return $this;
    }

    public function setActionCourante($actionCourante) {
        $this->actionCourante = $actionCourante;
        return $this;
    }

        /**
     * retourne l'action courante de l'application
     * @return string
     */
    public static function getActionCourante() {
        return Application::getInstance()->actionCourante;
    }
    /**
     * retourne le chemin absolu vers le fichier courant
     * @return string
     */
    public static function getCheminAbsolu() {
        return Application::getInstance()->cheminAbsolu;
    }
    /**
     * retourne les parametres de configuration de l'application
     * @return Configuration
     */
    public static function getConfig() {
        return self::$_instance->configuration;
    }

    /**
     * retourne l'instance de Application
     * @param string $fichierIni
     * @return Application
     */
    public static function getInstance($fichierIni = "") {
        if (is_null(self::$_instance)) {
            self::$_instance = new Application($fichierIni);
        }
        return self::$_instance;
    }
     /**
      * inclus un fichier helper.
      * @param string $helper
      */
    public static function useHelper($helper) {
        $chemin = 'application/helpers/';
        $suffixe = '.helper.php';
        $filehelper = $chemin . $helper . $suffixe;
        if (is_readable($filehelper)) {
            require_once $filehelper;
        } else {
            die("helper $filehelper innexistant");
        }
    }
    /**
     * execute l'action choisit du controleur de l'application
     * @throws Erreur
     */
    public function executer() {
        $controller = HTTPHelper::get('controller', Application::getInstance()->getControleurParDefaut());
        Application::getInstance()->setControlleurCourant($controller);
        $chemin = 'application/controllers/';
        $fichierController = $chemin . $controller . '.controller.php';

        if (!is_readable($fichierController))
            throw new Erreur('Pas lisible');
        require_once $fichierController;
        $class = $controller . 'Controller';
        if (!class_exists($class))
            throw Erreur('Classe inexistante');
        $myObject = new $class();
        $action = HTTPHelper::get('action', $myObject->getActionParDefaut());
        Application::getInstance()->setActionCourante($action);
        $myObject->executer($action);
        Page::afficher();
    }

    /**
     * retourne la socket qui lie l'application a la base de données
     * @return PDO
     */
    public static function getDB() {
        return Application::getInstance()->base;
    }
    /**
     * retourne la page courante
     * @return Page
     */
    public static function getPage() {
        return Page::getInstance();
    }
    /**
     * utilise le model $nommodel pour se connecter a la base de donnees
     * @param string $nommodel
     */
    public function useModele($nommodel) {
        $filemodel = "application/models/" . $nommodel . ".model.php";
        if (is_readable($filemodel)) {
            require_once $filemodel;
        } else {
            die("model illisible");
        }
    }
    /**
     * recupere les parametres de configuration de  la base de donnees
     */
    public function utiliserAuthentification() {

        $config = $this->configuration;
        try {
            $table = $config->auth_table;
            $id = $config->auth_col_id;
            $login = $config->auth_col_login;
            $mdp = $config->auth_col_mot_de_passe;
            $creation = $config->auth_col_sel;
            Authentification::getInstance($table, $id, $login, $mdp, $creation);
        } catch (Exception $ex) {
            die("Erreur configuration " . $ex->getMessage());
        }
    }

}
