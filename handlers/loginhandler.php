<?php

require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../template-functions/template-functions.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

   config::core();

   $data = [
      "name" => verifyData($_POST["name"]),
      "surname" => verifyData($_POST["surname"]),
      "pswd" => verifyData($_POST["pswd"]),
      "email" => verifyData($_POST["email"]),
      "phone" => 0,
   ];

   $error = [
      "name" => 0,
      "surname" => 0,
      "email" => 0,
      "pswd" => 0,
      "exists" => 0
   ];

   $actions = [
      "login" => "Войти",
      "reg" => "Регистрация"
   ];

   if ($_POST["sumbit"] == $actions["login"]) {
      unset($data["name"], $data["surname"], $data["phone"]);
      $pdo = new DataBase;
      $data["pswd"] = sha1($data["pswd"]);
      if ($pdo->exists("user", $data)) {
         $result = $pdo->select(["user"], [ "*" ], $data, [], true);
         user::setSession($result);
      }
      $pdo->disconnect();
      
   } else if ($_POST["sumbit"] == $actions["reg"]) {
      $pattern_name = "/^[A-Za-zА-Яа-я]{3,15}$/";
      $pattern_pswd = "/^[0-9A-Za-z$;%]{8,30}$/";

      if (!preg_match($pattern_name, $data['name']) && mb_strlen($data['name']) > 15 && !empty($data['name'])) {
         $error['name'] = 1;
      }
      if (!preg_match($pattern_name, $data['surname']) && !empty($data['surname'])) {
         $error['surname'] = 1;
      }
      if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL) && !empty($data['email'])) {
         $error['email'] = 1;
      }
      if (!preg_match($pattern_pswd, $data['pswd']) && !empty($pswd)) {
         $error['pswd'] = 1;
      }

      // Занесение пользователя в базу данных
      if (!in_array(1, $error)) {
         
         $logpas = [
            "email" => $data["email"]
         ];

         $pdo = new DataBase;

         if ($pdo->exists("user", ["email" => $data["email"]])) {
            $error["exists"] = 1;
            $pdo->disconnect();
         } else {
            $data["pswd"] = sha1($data["pswd"]);
            $user = [
               "user_id" => $result["user_id"],
               "role_id" => 2
            ];
            $result = $pdo->insert("user", $data, ["user_id"]);
            $pdo->insert("user_roles", $user);
            user::setSession($result);
            $pdo->disconnect();
            header("Location: ./login.php");
         }
      }
   }
}
