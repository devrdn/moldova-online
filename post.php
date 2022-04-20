<?php


if (empty($_GET)) {
   header("HTTP/1.1 404 Not Found");
   exit();
}

require_once "config.php";

require_once "template-functions/template-functions.php";

config::core();




if (preg_match("/^\d+$/", $_GET["p"])) {

   if (!postExist($_GET["p"])) {
      header("HTTP/1.1 404 Not Found");
      exit();
   } else {

      require_once __DIR__ . "/template-parts/header.php";

      $result = getPost($_GET["p"]); ?>
      <div class="container post__container">
         <div class="post">
            <img style="width: 100%" src="<?= $result["post_img"]; ?>" alt="">
            <div class="post__title">
               <?= $result["post_title"]; ?>
            </div>
            <div class="post__content">
               <?= $result["post_content"]; ?>
            </div>
         </div>
      </div>
<? }
}



require_once __DIR__ . "/template-parts/footer.php";
