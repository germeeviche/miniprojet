<?php

/**************************************************************************
* Source File	:  CRE.php
* Author        :  NGUIMNANG
* Project name  :  miniprojet Documents Administratifs       Date:  22/12/2014
* Modified   	:  22/12/2014
* Description	:  Definition of the class CRE
**************************************************************************/




class creController extends Controller			
{
	//Attributes
		
	 
	var $id; // type : string
	var $comportement; // type : string
	var $duree; // type : string
	var $salle; // type : string
	var $materiel; // type : string

	//Operations
	public function  __construct(){
        //choisir une action par defaut avec la methode setActionParDefaut du controller        
            
        }
        
        /**
         * permet d'ajouter une cre
         */
        public function ajouterAction(){
            
            //recuperer l'instance de la page
            
            //recuperer les donnees necessaire pour la page par la methode post du helper $page->duree,$page->duree,$page->salle etc...

            //choisir le template application
            
            //choisir la vue ajouter_cre.view
            
            //creer une instance de creModel
            
            //utiliser la methode enregistrer
        }
	 
           /**
         * permet d'editer une cre
         */
        public function editerAction(){
            
            //recuperer l'instance de la page
            
            //recuperer les donnees necessaire pour la page par la methode post du helper $page->duree,$page->duree,$page->salle etc...

            //choisir le template application
            
            //choisir la vue editer_cre.view
            
            //creer une instance de creModel
            
            //utiliser la methode enregistrer
        }
	   /**
         * permet de supprimer une cre
         */
        public function supprimerAction(){
            
            //recuperer l'instance de la page
            
            //recuperer les donnees necessaire pour la page par la methode post du helper $page->duree,$page->duree,$page->salle etc...

            //choisir le template application
            
            //choisir la vue supprimer_cre.view
            
            //creer une instance de creModel
            
            //utiliser la methode enregistrer
        }
	 
	

} // End Class CRE


?>

