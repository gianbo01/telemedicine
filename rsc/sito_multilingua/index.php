<?php 
session_start();
if($_GET['lang']){
	$_SESSION['lang'] = $_GET['lang'];
	header('Location:'.$_SERVER['PHP_SELF']);
	exit();
}
switch($_SESSION['lang']){
  case "it":
        require('lang/it.php');		
    break;
 	case "en":
		require('lang/en.php');		
	break;
	case "fr":
		require('lang/fr.php');		
	break;		
	default: 
		require('lang/it.php');		
	}
?>

<!DOCTYPE html>
 <html>
	<head>
	</head>
	<body>
			<h1><?php echo $TITOLO; ?></h1>
			<p><?php echo $TESTO; ?></p>
			<p><b><?php echo $LINGUA; ?></b></p>
			
			<a href="?lang=it"><img  src="img/it.jpg" alt="it" title="it" /></a>
			<a href="?lang=en"><img  src="img/en.jpg" alt="en" title="en" /></a>
            <a href="?lang=fr"><img  src="img/fr.jpg" alt="fr" title="fr" /></a>
	</body>
 </html> 
      