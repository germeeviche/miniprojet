
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Fixed Top Navbar Example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="styles/bootstrap.css" rel="stylesheet" type='text/css'>
        <link href="styles/font-awesome.min.css" rel="stylesheet" type='text/css'>
    <link href="styles/index_template.css" rel="stylesheet" />

    
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>-->
            
            <img src="images/logo3il.jpg" alt="logo de 3il">
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="#"><i class="fa fa-home">&nbsp;</i>Acceuil</a></li>
           
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i> Opérations<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                  <li><a href="#"><i class="fa fa-pencil"></i>&nbsp;Editer FM</a></li>
                <li><a href="#"><i class="fa fa-pencil"></i>&nbsp;Editer CRE</a></li>
                <li><a href="#"><i class="fa fa-calendar"></i>&nbsp;Organiser les sessions</a></li>
                <li><a href="#"><i class="fa fa-paper-plane"></i>&nbsp;Affecter FM</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-male">&nbsp;</i>Profil <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                  <li><I>nom</I></li>
                <li><I>prenom</I></li>
                <li><I>adresse electronique</I></li>
                <li class="divider"></li>
                <li class="dropdown-header"><i>matière coordonnée</i></li>
                <li class="dropdown-header"><i>responsable de quelle matière?</i></li>
                <li class="btn-success col-lg-10 col-lg-offset-1"><a href="#"> <i class="fa fa-power-off"></i> Deconnexion</a></li>
              </ul>
            </li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    
 
    
    <div class="row">
    <!-- uncomment code for absolute positioning tweek see top comment in css -->
    <!-- <div class="absolute-wrapper"> </div> -->
    <!-- Menu -->
    <div class="side-menu">
    
    <nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <br/><br/>
    <!-- Main Menu -->
    <div class="side-menu-container">
        <ul class="nav navbar-nav">

            <li><a href="#"><i class="fa fa-bars"></i></span>&nbsp;TOUT</a>
            
                <a data-toggle="collapse" href="#search" class="btn btn-default brand-name-wrapper" id="search-trigger">
              <span class="glyphicon glyphicon-search"></span>
            </a>

            <!-- Search body -->
            
            <div id="search" class="panel-collapse collapse">
                <div class="panel-body">
                    <form class="navbar-form" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-ok"></span></button>
                    </form>
                </div>
            </div>
            
            </li>
            <!-- Dropdown-->
            <li class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" href="#dropdown-lvl1">
                    <i class="fa fa-book"></i> &nbsp;CRE <span class="caret"></span>
                </a>

                <!-- Dropdown level 1 -->
                <div id="dropdown-lvl1" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li><a href="#">&nbsp;TRAITE</a></li>
                            <li><a href="#">&nbsp;NON TRAITE</a></li>
                        </ul>
                    </div>
                </div>
            </li>
         
          <li class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" href="#dropdown-lvl2">
                    <i class="fa fa-newspaper-o"></i>&nbsp;FM<span class="caret"></span>
                </a>

                <!-- Dropdown level 1 -->
                <div id="dropdown-lvl2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li><a href="#">&nbsp;TRAITE</a></li>
                            <li><a href="#">&nbsp;NON TRAITE</a></li>
                        </ul>
                    </div>
                </div>
            </li>

            <li><a href="#"><i class="fa fa-folder-open-o"></i></span>&nbsp;DOMAINES</a></li>

        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
    
    </div>

    <!-- Main Content -->
    <div class="container-fluid">
        <br/><br/><br/>
        <div class="side-body">
           <?php Page::afficherVue(); ?>
        </div>
    </div>
</div>
    
    
    
    
    
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="javascript/jquery-2.1.3.min.js"></script>
    <script src="javascript/bootstrap.js"></script>
    <script src="javascript/index_template.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
