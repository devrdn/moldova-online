<?php

/**
 * Add Script
 */
function add_script($script_name)
{
?>
   <script type="text/javascript" src="<?= $script_name ?>"></script>
   <?
}

function verifyData($params, $replaceNull = false, $replacement = 0)
{
   strip_tags($params);
   htmlspecialchars($params);
   htmlentities($params);
   stripslashes($params);
   if ($replaceNull) {
      if (empty($params)) {
         $params = (int)$replacement;
      }
   }
   return $params;
}

function pre_dump($param)
{
   echo "<pre>";
   echo var_dump($param);
   echo "</pre>";
}

function getSex($param)
{
   if (empty($param)) {
      return verifyData($param, true);
   } else if ($param == "Мужской") {
      return 1;
   } else {
      return 0;
   }
}

function thePost()
{
   $pdo = new DataBase;
   $result = $pdo->query("SELECT * FROM (SELECT * FROM posts ORDER BY id DESC LIMIT 3) AS T ORDER BY id ASC", true);

   foreach ($result as $param) : ?>
      <div class="info__box box__news post-<?=$param["id"]; ?>">
         <div class="post__image">
            <img width="387px" height="187px" src="<?= $param["post_img"]; ?>" alt="">
         </div>
         <div class="post__info">
            <span class="post__title">
               <?= $param["post_title"]; ?>
            </span>
            <div class="post__content">
               <?= $param["post_content"]; ?>
            </div>
            <div class="read-more">
               <a href=<?="./post.php?p=".$param["id"]; ?>>Читать далее ... </a>
            </div>
         </div>
      </div>

<? endforeach;

   $pdo->disconnect();
}

function getPost(int $id) {
   $post_id = [
      "id" => verifyData($id),
   ];
   $pdo = new DataBase;
   $result= $pdo->select(["posts"], ["*"], $post_id, [], true);
   $pdo->disconnect();
   return $result;
}

function postExist(int $id) {
   $post_id = [
      "id" => verifyData($id),
   ];
   $pdo = new DataBase;
   $result = $pdo->exists("posts", $post_id);
   $pdo->disconnect();
   return $result;
}