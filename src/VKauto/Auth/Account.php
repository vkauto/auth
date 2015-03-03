<?php

namespace VKauto\Auth;

class Account
{
	/**
	 * Токен для работы с API
	 * @var string
	 */
	public $access_token;

	/**
	 * ID пользователя
	 * @var int
	 */
	public $user_id;

	/**
	 * Массив, содержащий данные, передающиеся классу Captcha
	 * @var array
	 */
	public $captcha;

	public function __construct($access_token, $user_id)
	{
		$this->access_token = $access_token;
		$this->user_id		= $user_id;
	}
}
