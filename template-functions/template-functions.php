<?php 
/**
 * Add Script
 */
function add_script($script_name) {
   ?>
   <script type="text/javascript" src="<?=$script_name?>"></script>
   <?
}

function verifyData($params) {
   strip_tags($params);
   htmlspecialchars($params);
   htmlentities($params);
   stripslashes($params);
   return $params; 
}
