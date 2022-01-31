<?php
require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconn.php';
use \Twig\Loader\FilesystemLoader, \Twig\Environment;
$loader = new FilesystemLoader(array_filter(array_map(fn($dir) => is_dir(dirname(__DIR__) . "/view/{$dir}/") ? dirname(__DIR__, 1) . "/view/{$dir}/" : false, array_diff(scandir(dirname(__DIR__) . '/view/'), ['..', '.'])), fn($elem) => !is_bool($elem)));
$twig = new Environment($loader, ['debug' => true]);