<?php 

require_once __DIR__."/../config.php";
require_once __DIR__."/../template-functions/template-functions.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
   config::core();

   $data = [
      "name" => verifyData($_POST["name"]),
      "nickname" => verifyData($_POST["nickname"]),
      "email" => verifyData($_POST["email"]),
      "pswd" => verifyData($_POST["pswd"])
   ];

   $error = [
      "name" => 0,
      "nickname" => 0,
      "email" => 0,
      "pswd" => 0
   ];

   $actions = [
      "login" => "Войти",
      "reg" => "Регистрация"
   ];

   if($_POST["sumbit"] == $actions["login"]) {
      if ($data["name"] == 0) {
        
      }
   }
   
   else if ($_POST["sumbit"] == $actions["reg"]) {
      if ($data["name"] == 0) {
         
      }
   }
   
}