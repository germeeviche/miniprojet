<?php
    defined('__FRAMEWORK3IL__') or die('Acces interdit');
    /**
     * @abstract Helper pour formulaire
     */
    abstract class FormHelper {
        const SESSION_KEY = 'framework3il.csrfToken';
        
        private static $cle = null;        
        /**
         * recupere la cle CSRF a la premiere entree sur le formulaire
         * @return string
         */
        private static function getCle() {    
            if(!isset($_SESSION['cle'])){
                $_SESSION['cle']=  hash("sha256", uniqid());
            }
            return FormHelper::$cle;
        }
        /**
         * cree un champ cachee pour transmettre la cle
         */
        public static function cleCSRF() {
            $cle=self::getCle();
          ?>  
                 <input type="hidden" name="cle" value="<?php echo $cle ?>"/>
          <?php  
        }
        /**
         * valide la cle CSRF 
         * @return boolean
         */
        public static function validerCleCSRF() {            
        
            if(!isset($_SESSION['cle'])){
                return false;
            }
            else{
                $testcle=HTTPHelper::post('cle','');
                
                if($testcle!=self::$cle){
                    return false;
                }
                return true;
            }
        }
        
    }

