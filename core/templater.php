<?php

include_once "/../config.php";

class templater {
   
   var $template;

   public function __construct($template) {
      $this->template = $template;
   }

   public function getTemplate() {

      $html =  $this->template;

      $file = __DIR__ . "\..\data\main.json";
      

      $changer = json_decode(file_get_contents($file), true);

      foreach($changer as $name => $value) {
         $html = str_replace("{{$name}}", $value, $html);
      }


      return new templater($html);
   }

   public function value() {
      return $this->template;
   }
}
