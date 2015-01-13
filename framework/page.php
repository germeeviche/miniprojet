<?php
defined('__FRAMEWORK3IL__') or die('Acces interdit');

class Page {
   
    public $formMessage="";
    protected $vue = null;
    protected $template = null;
    private static $_instance = null;
    protected $css = [""];
    protected $script=[];


    /**
     * constructeur de Page
     */
    private function __construct() {
        $css=[""];
    }

    /**
     * ajoute un fichier css a la page
     * @param string $fichierCSS
     */
    public function ajouterCSS($fichierCSS) {
        $chemin = 'styles/';
        $suffixe = '.css';
        $cssfile=$chemin . $fichierCSS . $suffixe;
        if(!is_readable($cssfile)) die("ERROR $cssfile inexistant");
        
        array_push($this->css, $cssfile);
    }
     /**
     * ajoute un fichier script a la page
     * @param string $fichierJS
     */
    public function ajouterScript($fichierJS) {
        $chemin = 'javascript/';
        $suffixe = '.js';
        $jsfile=$chemin . $fichierJS . $suffixe;
        if(!is_readable($jsfile)) die("ERROR $jsfile inexistant");
        
        array_push($this->script, "$jsfile");
       
      
    }

  
     /**
      * genere l'entete de la page a partir des fichiers css
      */
    public static function enteteCSS() {
        foreach (Page::getInstance()->css as $link) {
            ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $link; ?>" />
            <?php
        }
    }
      /**
      * genere l'entete de la page a partir des fichiers css
      */
    public static function inclureJS() {
      
        foreach (Page::getInstance()->script as $link) {
              
            ?>
            <script type="text/javascript" src="<?php echo $link; ?>" ></script>
            <?php
            
        }
    }

    /**
     * retourne une instance de la page
     * @return Page
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new Page();
        }
        return self::$_instance;
    }

    /**
     * definit la vue lié a la page
     * @param string $nomvue
     */
    public function setVue($nomvue) {
        $filevue = "application/views/" . $nomvue . ".view.php";
        if (file_exists($filevue)) {
            $this->vue = $nomvue;
        } else {
            die("vue inexistante ");
        }
    }

    /**
     * definit le template de la page
     * @param string $nomtmp
     */
    public function setTemplate($nomtmp) {
        $filevue = "application/templates/" . $nomtmp . ".template.php";
        if (file_exists($filevue)) {
            $this->template = $nomtmp;
        } else {
            die("template $filevue inexistante ");
        }
    }

    /**
     * affiche le template de la page
     */
    public static function afficher() {
        $filevue = "application/templates/" . Page::getInstance()->template . ".template.php";

        if (file_exists($filevue)) {
            require_once $filevue;
        } else {
            die("template non renseigne");
        }
    }

    /**
     * insere la vue dans le template de la page
     */
    private function insererVue() {
        $filevue = "application/views/" . $this->vue . ".view.php";
        require_once $filevue;
    }

    /**
     * affiche la vue de la page
     */
    public static function afficherVue() {
        $filevue = "application/views/" . Page::getInstance()->vue . ".view.php";
        if (!empty($filevue)) {
            Page::getInstance()->insererVue();
        } else {
            die("vue non renseigne");
        }
    }

}
