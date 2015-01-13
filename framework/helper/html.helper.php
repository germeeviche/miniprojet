<?php
    defined('__FRAMEWORK3IL__') or die('Acces interdit');
    /**
     * @abstract helper pour le contenu html
     */
    abstract class HTMLHelper {
        /**
         * cree les options de la balise select
         * @param string $texte
         * @param string $valeur
         * @param string $defaut
         */
        public static function option($texte,$valeur=null,$defaut=null){
            $selected = '';
            
            if(is_null($valeur)){
                $valeur = $texte;
            }
                
            if(!is_null($defaut)){
                if($valeur == $defaut){
                    $selected = ' selected';
                }
            }
            ?>
            <option value="<?php echo $valeur;?>" <?php echo $selected;?>><?php echo $texte;?></option>
            <?php 
        }
    }
