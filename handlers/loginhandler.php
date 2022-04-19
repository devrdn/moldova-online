<?php

require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../template-functions/template-functions.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

   config::core();

   $data = [
      "name" => verifyData($_POST["name"]),
      "surname" => verifyData($_POST["nickname"]),
      "email" => verifyData($_POST["email"]),
      "pswd" => verifyData($_POST["pswd"])
   ];

   $error = [
      "name" => 0,
      "surname" => 0,
      "email" => 0,
      "pswd" => 0
   ];

   $actions = [
      "login" => "Войти",
      "reg" => "Регистрация"
   ];

   if ($_POST["sumbit"] == $actions["login"]) {
      if ($data["name"] == 0) {
      }
   } else if ($_POST["sumbit"] == $actions["reg"]) {
      $pattern_name = "/^[A-Za-zА-Яа-я]{3,15}$/";
      $pattern_pswd = "/^[0-9A-Za-z$;%]{8,30}$/";

      if (preg_match($pattern_name, $data['name']) && mb_strlen($data['name']) > 15 && !empty($data['name'])) {
         $error['name'] = 1;
      }
      if (preg_match($pattern_name, $data['surname']) && !empty ($data['surname'])) {
         $error['surname'] = 1;
      }
      if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL) && !empty($data['email'])) {
         $error['email'] = 1;
      }
      if (preg_match($pattern_pswd, $data['pswd']) && !empty($pswd)) {
         $error['pswd'] = 1;
      }

   }
}
