<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

const DS = DIRECTORY_SEPARATOR;
const CONTROLLER_NAMESPACE = "app\\controllers\\";
define("ROOT", dirname(__DIR__));
define("viewsFolders", array_map(fn($dir) => ROOT . DS . 'views' . DS . $dir, array_filter(scandir(ROOT . DS . 'views'), fn($dir) => !in_array($dir, ['.', '..']))));
/**
 * Database
 */
$DBH = new PDO('mysql:host=MariaDb;dbname=shop', 'sinstranger', 'example');
$DBH->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
/*Twig*/
require_once ROOT . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
const TwigLoader = new FilesystemLoader(viewsFolders);
const Twig = new Environment(TwigLoader, ['debug' => true]);