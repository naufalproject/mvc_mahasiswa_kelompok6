<?php
if(!session_id()) session_start();

// 1. Panggil URL Config
require_once '../config/config.php';

// 2. Panggil Database Config
require_once '../config/database.php';

// 3. Panggil Core (Pastikan jalurnya benar sesuai folder kamu)
require_once '../core/Controller.php';
require_once '../core/Database.php';
require_once '../core/Router.php';

$router = new Router();
$router->run();