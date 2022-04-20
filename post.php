<?php 


require_once "config.php";

require_once "template-functions/template-functions.php";

config::core();


require_once __DIR__. "/template-parts/header.php";

if(preg_match("/^\d+$/", $_GET["p"])) {
   $result = getPost($_GET["p"]);
   // вывод контена поста
   echo $result["post_title"]."<br><br>";
   echo $result["post_content"];
}



require_once __DIR__. "/template-parts/footer.php";