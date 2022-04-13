<?php

include_once __DIR__."/config.php";
include_once __DIR__."/core/templater.php";

$page = __DIR__."/template-parts/header.php";
echo $CORE;
$tpl = new templater(file_get_contents($page));
echo $tpl->getTemplate()->value();