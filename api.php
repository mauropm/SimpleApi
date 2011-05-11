<?php
  /*
   * SimpleAPI 
   * @author Mauro Parra <mauropm@gmail.com>
   * (c) 2011 Mauro Parra mauropm@gmail.com
   */ 

  // La APIKEY se define en config.php
  // La configuracion de la base de datos tales como:
  // host, user, password, dbname esta en config.php.

require_once('config.php');
require_once('utilities.php');

function insert_message($num, $message){ 
  // Aqui va el codigo de conexion a la base y el respectivo query
  $mysql = my_connect();
  my_use(DB_NAME,$mysql);  
  $query= sprintf("INSERT INTO inbound (NUM,MSG) values ('%s','%s')",
		  mysql_real_escape_string($num),
		  mysql_real_escape_string($message));
  // Corremos el query, que no puede ser vacio, porque de otra forma 
  // hubieramos entrado al "die" y no llegariamos aca. 
  $result = mysql_query($query,$mysql);
  my_check_result($result,$query,$mysql);
  // Establecemos el row como el numero de resultados del query.
  $rows =  mysql_num_rows($result);
  if($rows>0){ 
    return 0; 
  } else { 
    return 1;
  }
}

/* 
 * En este caso, no tenemos "autenticacion" formalmente. 
 * Por seguridad, proporcionaremos un apikey, de 
 * tal forma que autentiquemos que la llamada proviene de 
 * un sitio confiable. 
 */


function api ($api, $method, $num,$message="VACIO") { 
  if($api!=API_KEY){
    printerr("API KEY Invalida, intente de nuevo");
  } else { 
    switch($method){
    case "put":
      insert_message($num,$message);
      break;
    }
  }
}
?>