<?php

namespace App\Billing;

class Stripe
{
	protected $secret;

	public function __construct($secret)
	{
		$this->secret = $secret;
	}

	public function greeting($word)
	{
		return $word . ' world!';
	}
}
