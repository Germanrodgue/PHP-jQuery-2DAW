
<?php
/*
		include("utils/functions.inc.php");

		$user = $_SESSION['user'];
		debug($user);
		echo $_SESSION['msje'];*/

		echo $_SESSION['msje'];
		print_r ($_SESSION['user']);
		//debug($user);
		//	die();
		require_once("includes/DAO.php");
		
		$daouser = new DAO();
		$rdo = $daouser->nuevo_user($_SESSION['user']);
		if($rdo){
			echo $_SESSION['msje'];
		}else{
			echo 'error';
		}
		
		//$rdo = $nuevo->list_fetch_assoc_comentario();
		//echo $rdo;
		echo "<br>";
	?>
	<a href="index.php">Volver</a>
