<?php
const DS = DIRECTORY_SEPARATOR;
define("ROOT", dirname(__DIR__));
/**
 * Database
 */
$DBH = new \PDO('mysql:host=MariaDb;dbname=shop', 'sinstranger', 'example');
$DBH->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);