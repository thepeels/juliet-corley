<?php

return array(
	'table' => 'oauth_identities',
	'providers' => array(
		'facebook' => array(
			'client_id' => '1567619263568720',
			'client_secret' => '403b194db0acd05a97b1ccec7ea9432b',
			'redirect_uri' => URL::to('facebook/login'),
			'scope' => array(),
		),
		'google' => array(
			'client_id' => '644392492282-ier6n14askn4ot13jd3k4prg6isvvdst.apps.googleusercontent.com',
			'client_secret' => 'PjqiZEqqNDdxVttZSXVL5vgP',
			'redirect_uri' => URL::to('google/login'),
			'scope' => array(),
		),
		'github' => array(
			'client_id' => '8bf4a25d704ee7764a4a',
			'client_secret' => '17b6c2c1886d3aa88b7bbb6e7dd7a7cc4314fbdc',
			'redirect_uri' => URL::to('github/login'),
			'scope' => array(),
		),
		'linkedin' => array(
			'client_id' => '12345678',
			'client_secret' => 'y0ur53cr374ppk3y',
			'redirect_uri' => URL::to('your/linkedin/redirect'),
			'scope' => array(),
		),
		'instagram' => array(
			'client_id' => '12345678',
			'client_secret' => 'y0ur53cr374ppk3y',
			'redirect_uri' => URL::to('your/instagram/redirect'),
			'scope' => array(),
		),
	)
);
