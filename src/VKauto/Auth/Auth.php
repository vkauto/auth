<?php

namespace VKauto\Auth;

use VKauto\Utils\QueryBuilder;
use VKauto\Utils\Request;
use VKauto\Auth\Account;

class Auth
{
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
}