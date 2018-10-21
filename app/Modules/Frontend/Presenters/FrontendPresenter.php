<?php

/**
 * @author Jiří Svěcený <sveceny@sitole.cz>
 * @copyright 2018 Jiří Svěcený
 * @version 17.07.2018
 */

declare(strict_types=1);

namespace App\Modules\Frontend\Presenters;

use Nette;
use Nette\Application\UI\Presenter;


/**
 * Abstract parent for Frontend presenters
 */
abstract class FrontendPresenter extends Presenter
{
	/**
	 * @var Nette\Http\Session
	 * @inject
	 */
	public $sessions;
}
