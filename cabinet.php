<?php
require_once __DIR__ . "/config.php";

config::core();

if(!isset($_SESSION["user"])) {
   header("Location: .");
   exit();
}

require_once __DIR__ . "/handlers/loginhandler.php";

require_once "template-parts/header.php";

require_once "template-parts/cabinet_menu.php";

require_once "template-parts/footer.php";
