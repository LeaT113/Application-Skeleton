<?php

/**
 * @author Jiří Svěcený <sveceny@sitole.cz>
 * @copyright 2018 Jiří Svěcený
 * @version 23.10.2018
 */

declare(strict_types=1);

namespace App\Models\UI;

use Nette\Application\UI\Presenter;


abstract class BasePresenter extends Presenter
{
	/**
	 * Return presenter dirname
	 * @return string
	 */
	private function getPresenterDirname(): string
	{
		return dirname($this->getReflection()->getFileName());
	}


	/**
	 * Presenter template file name generator
	 * @return string[]
	 */
	public function formatTemplateFiles(): array
	{
		return [
			$this->getPresenterDirname() . '/templates/' . $this->view . '.latte',
		];
	}


	/**
	 * Presenter layout template file
	 * @return string[]
	 */
	public function formatLayoutTemplateFiles(): array
	{
		// A little hack to get a module folder
		$modulDirname = dirname(dirname($this->getPresenterDirname()));

		return [
			$modulDirname . '/@layout.latte',
		];
	}
}
