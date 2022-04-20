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
      "phone" => verifyData($_POST["phone"], true),
      "sex" => getSex($_POST["sex"])
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
      "reg" => "Регистрация",
      "edit" => "Сохранить изменения"
   ];

   $main_table = [
      "user"
   ];

   $all_data = [
      "*"
   ];

   // проверка входа
   if ($_POST["sumbit"] == $actions["login"]) {
      unset($data["name"], $data["surname"], $data["phone"], $data["sex"]);
      $pdo = new DataBase;
      $data["pswd"] = sha1($data["pswd"]);
      if ($pdo->exists("user", $data)) {
         $result = $pdo->select($main_table, $all_data, $data, [], true);
         user::setSession($result);
         unset($_POST);
         header("Location: ./cabinet.php");
      }
      $pdo->disconnect();
      $error["exists"] = 1;
      // проверка авторизации
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
            $result = $pdo->insert("user", $data, $all_data);
            $user = [
               "user_id" => $result["user_id"],
               "role_id" => 2
            ];
            $pdo->insert("user_roles", $user);
            user::setSession($result);
            $pdo->disconnect();
            header("Location: .");
         }
      }
      // проверка изменения профиля
   } else if ($_POST["submit"] == $actions["edit"]) {
      $pattern_name = "/^[A-Za-zА-Яа-я]{3,15}$/";
      $pattern_pswd = "/^[0-9A-Za-z$;%]{8,30}$/";
      //unset($data["pswd"]);
      if (!preg_match($pattern_name, $data['name']) && mb_strlen($data['name']) > 15 && !empty($data['name'])) {
         $error['name'] = 1;
      }
      if (!preg_match($pattern_name, $data['surname']) && !empty($data['surname'])) {
         $error['surname'] = 1;
      }
      if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL) && !empty($data['email'])) {
         $error['email'] = 1;
      }
      if ($data == $SESSION["user"]) {
         $error['equals'] = 1;
         echo "f";
         exit();
      } else {
         exit();
      }
      if (!in_array(1, $error)) {
         $pdo = new DataBase;

         $exists = [
            "email" => $data["email"]
         ];


         if ($pdo->exists("user", $exists)) {
             

            foreach(array_keys($data) as $key) {
              if($data[$key] == $_SESSION["user"][$key]) {
                 unset($data[$key]);
              }
            }

            pre_dump($data);

            $pdo->update("user", $data, ["user_id" => $_SESSION["user"]["user_id"]]);
            
            $where = [
               "user_id" => user::getUserId()
            ];

            $result = $pdo->select($main_table, $all_data, $where,  [], true);

            user::setSession($result, false);

            $pdo->disconnect();

            header("Location: .");
         } else {
            $error["exists"] = 1;
         }
      }
   }
}
