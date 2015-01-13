<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dataset
 *
 * @author DoricTsappi
 */
class Dataset implements iterator{
   /**
    *
    * @data mixed
    * @ordre mixed
    * @direction mixed 
    */
    public $data=null;
    public $ordre=null;
    public $direction=null;
    /**
     * cree un dataset
     * @param type $data
     * @param type $ordre
     * @param type $direction
     */
    public function __construct($data, $ordre, $direction) {
        $this->data = $data;
        $this->ordre = $ordre;
        $this->direction = $direction;
    }

    public function getOrdre() {
        return $this->ordre;
    }

    /**
     * retourne la direction
     * @return mixed
     */
    public function getDirection() {
        return $this->direction;
    }

    /**
     * verifie la validite de data
     * @return boolean
     */
        public function valid() {
        return key($this->data) !== null;
    }
    
    /**
     * retour a la case de depart
     * @return mixed
     */
    public function rewind() {
        return reset($this->data);
    }
    /**
     * monter d'un cran
     * @return mixed
     */
    public function next() {
        return next($this->data);
    }
    /**
     * cle
     * @return mixed
     */
    public function key() {
        return key($this->data);
    }
    /**
     * retourne le pointeur courant
     * @return mixed
     */
    public function current() {
        return current($this->data);
    }
    //put your code here
}
