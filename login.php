<?php 

require_once __DIR__."/config.php";

config::core();

require_once __DIR__ . "/handlers/loginhandler.php";

require_once "template-parts/header.php";

require_once "template-parts/login_form.php";

require_once "template-parts/footer.php";