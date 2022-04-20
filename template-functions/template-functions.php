<?php 
/**
 * Add Script
 */
function add_script($script_name) {
   ?>
   <script type="text/javascript" src="<?=$script_name?>"></script>
   <?
}

function verifyData($params, $replaceNull = false, $replacement = 0) {
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

function pre_dump($param) {
   echo "<pre>";
   echo var_dump($param);
   echo "</pre>";
}

function getSex($param) {
   if(empty($param)) {
      return verifyData($param, true);
   } else if ($param == "Мужской") {
      return 1;
   } else {
      return 0;
   }
}