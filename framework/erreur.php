<?php

defined('__FRAMEWORK3IL__') or die('Acces interdit');

class Erreur extends Exception {
    /**
     * constructeur de la classe Erreur
     * @param string $message
     */
    public function __construct($message) {
        parent::__construct($message);
    }
    /**
     * permet d'afficher la classe Erreur
     */
    public function __toString() {
        echo '<pre>';
        print_r($this->getTraceAsString());
        die();
        $config = Application::getConfig();
        if ($config->debug == 1) {
            require_once 'erreur_debug.php';
        } else {
            require_once 'erreur_production.php';
        }
        die();
    }

}
