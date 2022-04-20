<?php

require_once __DIR__ . "/../config.php";

config::core();

class User {
    public static function CheckPerm() {
        // ...
    }

    public static function setSession(array $data, bool $perm = true) {
        session_regenerate_id();
        $_SESSION["user"] = $data;
        if ($perm) {
            $_SESSION["permission"] = self::getPermission($data["user_id"]);
        }
    }

    public static function getPermission(int $id) : array {
        $pdo = new DataBase;
        $result = $pdo->query("SELECT DISTINCT c.description FROM capability c, permission p, user u, roles r, user_roles ur  
        WHERE c.capability_id = p.capability_id AND p.role_id <= r.role_id AND r.role_id = ur.role_id AND ur.user_id = {$id}", true, false);
        $pdo->disconnect();
        return array_column($result, "description");
    }

    public static function getUserId() : int {
        return $_SESSION["user"]["user_id"];
    }
}