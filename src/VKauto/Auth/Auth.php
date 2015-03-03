<?php

namespace VKauto\Auth;

use VKauto\Utils\QueryBuilder;
use VKauto\Utils\Request;
use VKauto\Auth\Account;

class Auth
{
	/**
	 * Прямая аутентификация по логину и паролю
	 * @param  string $login
	 * @param  string $password
	 * @return VKauto\Auth\Account
	 */
	public static function directly($login, $password)
	{

		$account = Request::VK(QueryBuilder::buildAuthURL($login, $password));

		if (isset($account->error))
		{
			echo($account->error_description . PHP_EOL);
			die;
		}

		return new Account($account->access_token, $account->user_id);
	}

	/**
	 * Получение данных текущего пользователя
	 * @param  string $token
	 * @return VKauto\Auth\Account
	 */
	public static function byToken($token)
	{
		$account = Request::VK(QueryBuilder::buildURL('users.get', ['user_id' => 0, 'access_token' => $token]));

		return new Account($token, $account->response[0]->uid);
	}
}
