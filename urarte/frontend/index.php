<?php 

require_once "controllers/template.controller.php";
require_once "controllers/curl.controller.php";
require_once "controllers/general.controller.php";
require_once "controllers/users.controller.php";

require "extensions/vendor/autoload.php";

$index = new TemplateController();
$index -> index();