<?php
	//PAGINA QUE TANCA LA SESSIO
	//UN COP TANCA REDIRIGEIX A LA PAGINA INICIAL I BORRA LA COOKIE
	session_start();
	session_unset();		//borra les variables de la sessió actual	
	session_destroy();		//borra la sessió
	$cookie_sessio = session_get_cookie_params();
	setcookie(session_name(),'',time() - 86400, $cookie_sessio['path'], $cookie_sessio['domain'], $cookie_sessio['secure'], $cookie_sessio['httponly']);   //elimina la cookie asociada a la sessió.

	header('Location: http://localhost/projecte1/homepage.html');
	exit();
?>
