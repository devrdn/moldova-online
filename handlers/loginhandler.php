<?php

require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../template-functions/template-functions.php";


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

   $pattern_name = "/^[A-Z][a-z][А-Я][а-я]{1,15}$/";
   $flag = 0;

   if ($_POST["sumbit"] == $actions["login"]) {
      if ($data["name"] == 0) {
         if (preg_match($pattern_name, $name)) {
            $err['name'] = '<small class="text-danger">Здесь только русские буквы</small>';
            $flag = 1;
         }
         if (mb_strlen($name) > 10 || empty($name)) {
            $err['name'] = '<small class="text-danger">Имя должно быть не больше 10 символов</small>';
            $flag = 1;
         }
      }
   }
}
