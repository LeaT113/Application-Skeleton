<?php

/**
 * @author Jiří Svěcený <sveceny@sitole.cz>
 * @copyright 2018 Jiří Svěcený
 * @version 17.07.2018
 */

namespace App\Modules\Frontend\Presenters;

use Nette\Application\UI\Presenter;
use Nette;


/**
 * Abstract parent for Frontend presenters
 */
abstract class FrontendPresenter extends Presenter
{
	/**
	 * @var Nette\Database\Context
	 * @inject
	 */
	public $database;

	/**
	 * @var Nette\Http\Session
	 * @inject
	 */
	public $sessions;
}