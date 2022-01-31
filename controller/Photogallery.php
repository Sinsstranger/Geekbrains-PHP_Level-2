<?php

class Photogallery
{

	static function getFilePaths($photogallery_path): array
	{
		return array_map(fn($filename) => str_replace($_SERVER['DOCUMENT_ROOT'], '', $photogallery_path . $filename), array_filter(array_diff(scandir($photogallery_path), ['..', '.']), fn($filename) => is_file($photogallery_path . $filename)));
	}
}