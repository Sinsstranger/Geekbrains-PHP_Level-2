<?php

namespace app\engine;

use app\interfaces\IRenderer;
use Twig\Environment;
use Twig\Error\{LoaderError, RuntimeError, SyntaxError};
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

class TwigRender implements IRenderer
{
	private $twig;

	public function __construct()
	{
		$this->twig = new Environment(new FilesystemLoader(viewsFolders), ['debug' => true]);
		$this->twig->addExtension(new DebugExtension());
	}

	/**
	 * @throws RuntimeError
	 * @throws SyntaxError
	 * @throws LoaderError
	 */
	public function renderTemplate($template, $params = []): string
	{
		return $this->twig->render($template, $params);
	}
}