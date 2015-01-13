<?php

defined('__FRAMEWORK3IL__') or die('Acces interdit');

class Configuration {

    private $data = null;
    private static $_instance = null;
    /**
     * Constructeur de la classe configuration
     * @param string $fichierIni
     */
    private function __construct($fichierIni) {
        if (!is_readable($fichierIni)) {
            die("Fichier de configuration manquant.");
        }
        $this->data = parse_ini_file($fichierIni);
        if (!$this->data) {
            die("Fichier de configuration invalide.");
        }
    }
    /**
     * recupere les le parametre de configuration ayant pour cle $popriete
     * @param string $propriete
     * @return string
     * @throws Erreur
     */
    public function __get($propriete) {
        if (!isset($this->data[$propriete])) {
            throw new Erreur('Propriété de configuration inconnue : ".$propriete');
        }
        return $this->data[$propriete];
    }

    /**
     * recupere l'instance unique de configuration
     * @param string $fichierIni
     * @return Configuration
     */
    public static function getInstance($fichierIni = '') {
        if (is_null(self::$_instance)) {
            self::$_instance = new Configuration($fichierIni);
        }
        return self::$_instance;
    }

}
