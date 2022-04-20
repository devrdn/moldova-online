<?php

require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../template-functions/template-functions.php";




if ($_SERVER["REQUEST_METHOD"] == "POST") {

    config::core();

    $data = [
        "name" => verifyData($_POST["name"]),
        "title" => verifyData($_POST["title"]),
        "text" => verifyData($_POST["text"]),
    ];

    $error = [
        "name" => 0,
        "title" => 0,
        "text" => 0
    ];

    $errormsg = [
        "name" => "* Неверно введено имя пользователя",
        "title" => "* Неверна введена фамилия пользователя",
        "text" => "* Неверно введен e-mail пользователя",
    ];

    $actions = [
        "add" => "Добавить пост",
    ];

    $main_table = [
        "posts"
    ];

    $all_data = [
        "*"
    ];

    // проверка входа
    if ($_POST["sumbit"] == $actions["reg"]) {
        $pattern_name = "/^[A-Z][a-z]{3,15}$/";
        $pattern_pswd = "/^[0-9A-Za-z$;%]{8,30}$/";

        if (!preg_match($pattern_name, $data['name']) || empty($data['name'])) {
            $error['name'] = 1;
        }
        if (!preg_match($pattern_name, $data['surname']) || empty($data['surname'])) {
            $error['surname'] = 1;
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL) || empty($data['email'])) {
            $error['email'] = 1;
        }
        if (!preg_match($pattern_pswd, $data['pswd']) || empty($pswd)) {
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
        $pattern_name = "/^[A-Z][a-z]{3,15}$/";
        $pattern_pswd = "/^[0-9A-Za-z$;%]{8,30}$/";
        $pattern_phone = "/^[+]?(373)?[0]?[67](0|8|7|9)\d{6}$/";
        if (!preg_match($pattern_name, $data['name']) || empty($data['name'])) {
            $error['name'] = 1;
        }
        if (!preg_match($pattern_name, $data['surname'])  || empty($data['surname'])) {
            $error['surname'] = 1;
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)  || empty($data['email'])) {
            $error['email'] = 1;
        }

        if (!preg_match($pattern_phone, $data['phone']) || empty($data['phone'])) {
            $error['phone'] = 1;
        }

        if (!in_array(1, $error)) {

            unset($data["pswd"]);
            $pdo = new DataBase;

            foreach (array_keys($data) as $key) {
                if ($data[$key] == $_SESSION["user"][$key]) {
                    unset($data[$key]);
                }
            }

            $exists = [
                "email" => $data["email"]
            ];

            if (isset($data["email"]) && $pdo->exists("user", $exists)) {
                $error['exists'] = 1;
            } else {
                if (count($data) == 0) {
                    $error["equals"] = 1;
                    $pdo->disconnect();
                } else {
                    $pdo->update("user", $data, ["user_id" => $_SESSION["user"]["user_id"]]);
                    $where = [
                        "user_id" => user::getUserId()
                    ];
                    $result = $pdo->select($main_table, $all_data, $where,  [], true);
                    user::setSession($result, false);
                    $pdo->disconnect();
                    header("Location: ./cabinet.php");
                }
            }
        }
    }
}
