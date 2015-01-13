<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author DoricTsappi
 */
class indexController extends Controller {
    //put your code here
    public function __construct() {
        
        $this->setActionParDefaut('index');
    }
    public function indexAction(){
        $page=  Page::getInstance();
        $page->setTemplate('index');
        $page->setVue('userconnect');
        $page->ajouterCSS("userconnect");
    }
   
}
