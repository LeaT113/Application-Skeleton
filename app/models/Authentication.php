<?php

/**
 * @author Jiří Svěcený <sveceny@sitole.cz>
 * @copyright 2018 Jiří Svěcený
 * @version 17.07.2018
 */

declare(strict_types=1);

namespace App\Models;

use Nette\Database;
use Nette\Security;


/**
 * Nette user authentication
 */
class Authentication implements Security\IAuthenticator
{
	/**
	 * @var Database\Context
	 */
	private $database;


	/**
	 * Authentication constructor
	 * @param Database\Context $database
	 */
	function __construct(Database\Context $database)
	{
		$this->database = $database;
	}


	/**
	 * @param array $credentials
	 * @return Security\IIdentity
	 * @throws Security\AuthenticationException
	 */
	function authenticate(array $credentials): Security\IIdentity
	{
		list($nickname, $password) = $credentials;

		$passwordManager = new Security\Passwords;

		$result = $this->database->table('app_users')->where('nickname', $nickname)->fetch();

		if(!$result) {
			throw new Security\AuthenticationException('User was not found');
		}

		if(!$passwordManager->verify($password, $result->password)) {
			throw new Security\AuthenticationException('Password is not correct');
		}

		return new Security\Identity($result->id, $result->permit, $result);
	}
}
