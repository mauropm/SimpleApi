<?php
  // SimpleAPI 
  // (c) 2011 Mauro Parra-Miranda <mauropm@gmail.com>
  // This index allows you to send requests to the messages tracker. 

require_once('api.php');

switch($_GET['method']){
 case "put":
   api($_GET['api'], $_GET['method'], $_GET['num'], $_GET['msg']);
   break;
 default:
   print("No method provided");
 }


?>