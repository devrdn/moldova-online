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
   $pattern_pswd = "/^([0-9a-z]{8,15})$/i";
   $flag = 0;

   if ($_POST["sumbit"] == $actions["login"]) {
      if ($data["name"] == 0) {
         if (preg_match($pattern_name, $name)) {
            $err['name'] = '<small class="text-danger">Здесь только русские буквы</small>';
            $flag = 1;
         }
         if (mb_strlen($name) > 15 || empty($name)) {
            $err['name'] = '<small class="text-danger">Имя должно быть не больше 15 символов</small>';
            $flag = 1;
         }
         if (mb_strlen($nickname) > 15 || empty($nickname)) {
            $err['nickname'] = '<small class="text-danger">Фамилия должна быть не больше 15 символов</small>';
            $flag = 1;
         }
         if (empty($nickname)) {
            $err['nickname'] = '<small class="text-danger">Поле не может быть пустым</small>';
            $flag = 1;
         }
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err['email'] = '<small class="text-danger">Формат Email не верный!</small>';
            $flag = 1;
         }
         if (empty($email)) {
            $err['email'] = '<small class="text-danger">Поле не может быть пустым</small>';
            $flag = 1;
         }
         if (preg_match($pattern_pswd, $pswd)) {
            $err['pswd'] = '<small class="text-danger">Пароль должен состоять из загланых и строчных букв, а также цифр</small>';
            $flag = 1;
         }
         if (mb_strlen($pswd) < 8 || empty($pswd)) {
            $err['pswd'] = '<small class="text-danger">Пароль должен содержать от 8 до 15 символос</small>';
            $flag = 1;
         }
         if ($flag == 0) {
            Header("Location:" . . "?mes=success"); //тут надо сделать 
         }
      }
   }
}
