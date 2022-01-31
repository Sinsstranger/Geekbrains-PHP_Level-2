<?php
require_once dirname($_SERVER['DOCUMENT_ROOT'], 1) . DIRECTORY_SEPARATOR . 'config/init.php';
spl_autoload_register(fn($class) => is_file(dirname(dirname($_SERVER['DOCUMENT_ROOT'], 1) . DIRECTORY_SEPARATOR . "controller/{$class}.php") ? require_once(dirname($_SERVER['DOCUMENT_ROOT'], 1) . DIRECTORY_SEPARATOR . "controller/{$class}.php") : null));
try {
	if (!isset($_GET['path'])) {
		$_GET['path'] = '/';
	}
	if (isset($twig)) {
		echo match ($_GET['path']) {
			'photogallery' => $twig->render('photogallery.twig', ['h1' => 'Photogallery', 'year' => date("Y"), 'photos' => Photogallery::getFilePaths($_SERVER['DOCUMENT_ROOT'] . '/assets/images/photogallery/'),]),
			default => $twig->render('mainpage.twig', ['h1' => 'HOME', 'year' => date("Y"),]),
		};
	}
} catch (\Twig\Error\LoaderError|\Twig\Error\RuntimeError|\Twig\Error\SyntaxError $e) {
	print_r($e);
}