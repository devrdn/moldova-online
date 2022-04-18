<?php 

class config {
   public const ROOT_DIR = __DIR__;

   public const CORE = [
      "templater",
      "user",
      "database"
   ];

   public const CORE_DIR = __DIR__ .'/core';

   public static function core() {
      session_start();
      foreach(self::CORE  as $core) {
         require_once self::CORE_DIR . "/{$core}.php";
      }
   }
}
