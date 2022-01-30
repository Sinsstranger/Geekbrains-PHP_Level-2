<?php
require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconn.php';
$loader = new \Twig\Loader\FilesystemLoader([dirname(__DIR__, 1) . '/view/common/', dirname(__DIR__, 1) . '/view/photogallery/']);
$twig = new Twig\Environment($loader, ['debug' => true]);