<?php
defined('__FRAMEWORK3IL__') or die('Acces interdit');
/**
 * @abstract servlet du code PHP
 */
abstract class HTTPHelper {
    /**
     * recupere dans source s'il existe la valeur associe a $cle dans le cas contraire retourne $defaut
     * @param string[] $source
     * @param string $cle
     * @param string $defaut
     * @return string
     */
    private static function fetch($source, $cle, $defaut = null) {
        if (isset($source[$cle])) {
            return $source[$cle];
        }
        return $defaut;
    }
    public function getParametresURL(){
        $url=array();
        $lien=$_SERVER['QUERY_STRING'];
        parse_str($lien,$url);
        if(!isset($url['controller'])){
            
            $url['controller']=  Application::getControlleurCourant();
            
        }
        if(!isset($url['action'])){
            $url['action']= Application::getActionCourante();
            
        }
        return $url;
    }
    /**
     * fetch avec $_GET
     * @param string $cle
     * @param string $defaut
     * @return string
     */
    public static function get($cle, $defaut = null) {

        return self::fetch($_GET, $cle, $defaut);
    }

    /**
     * fetch avec $_POST
     * @param string $cle
     * @param string $defaut
     * @return string
     */
    public static function post($cle, $defaut = null) {
        return self::fetch($_POST, $cle, $defaut);
    }

    /**
     * fait une redirection vers $url en affichant le message $message 
     * @param string $url
     */
    public static function rediriger($url,$message=NULL) {
        if($message!=NULL){
            Message::deposer($message);
        }
        if (!headers_sent()) {
            header('Location:' . $url);
            die();
        } else {
            ?>
            <script type="text/javascript">
                window.location = "<?php echo $url; ?>";
            </script>
            <?php
        }
    }

}
