<?php
defined('__FRAMEWORK3IL__') or die('Acces interdit');
/**
 * @abstract Controller
 */
abstract class Controller{
      protected $actionpardefaut=null;
      /**
       * recupere l'action par defaut du controlleur
       * @return string
       */
      public function getActionParDefaut(){
          return $this->actionpardefaut;
       }
       /**
        * definit l'action par defaut du controleur
        * @param string $action
        */
       public function setActionParDefaut($action){
            $method=$action.'Action';
            if(!method_exists($this, $method)){
               
               die("----methode $method innexistante-----");
            }
            else{
                $this->actionpardefaut=$action;
            }
       } 
    /**
     * execute l'action du controleur
     * @param string $action
     * @throws Erreur
     */
    public function executer($action){
      
        
        $method=$action.'Action';
        if(!method_exists($this, $method)){
            
            throw new Erreur("----methode innexistante-----");
        }
        else{
            $this->$method();
        }
        
    }
}