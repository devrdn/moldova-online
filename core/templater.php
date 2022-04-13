<?php

include_once __DIR__ . "/../config.php";

class templater
{

   /**
    * Шаблон страницы
    */
   var $template;

   /**
    * Конструктор с параметрами
    * @param string $template
    */
   public function __construct(string $template)
   {
      $this->template = $template;
   }

   /**
    * Заменяет совпадения в шаблоне на соответствующие фразы
    * @return Шаблон
    */
   public function setTemplate(): templater
   {
      $html =  $this->template;
      $file = __DIR__ . "\..\data\main.json";
      $changer = json_decode(file_get_contents($file), true);
      foreach ($changer as $name => $value) {
         $html = str_replace("{{$name}}", $value, $html);
      }
      return new templater($html);
   }

   /**
    * Возвращает шаблон
    */
   public function value()
   {
      return $this->template;
   }

   /**
    * Возвращает шаблон по пути $path
    * @param string @path
    */
   public static function getTemplate(string $path)
   {
      return file_get_contents($path);
   }
}
