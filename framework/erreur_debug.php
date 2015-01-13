<?php
$trace = $this->getTrace();
?>
<!DOCTYPE html>
<html>
<head>
<title>Erreur dans l'application</title>
<meta charset="utf-8">
</head>
<body>
<h1>Erreur</h1>
<p><?php echo $this->message; ?></p>
<p>Fichier : <?php echo $this->file;?></p>
<p>Ligne : <?php echo $this->line;?></p>
<?php if(count($trace)>0):?>
<p>Fonction : <?php echo $trace[0]['class'].'::'.$trace[0]['function']; ?></p>
<pre><?php echo $this->getTraceAsString(); ?></pre>
<?php endif;?>
</body>
</html>