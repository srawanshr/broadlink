<?php

return [
	'esewa' => [
		'test' => [
			'url' => 'https://dev.esewa.com.np/epay/main ',
		    'verification_url' => 'https://dev.esewa.com.np/epay/transrec',
		    'merchant_id' => "broad"
		],
		'live' => [
			'url' => 'https://esewa.com.np/epay/main',
		    'verification_url' => 'https://esewa.com.np/epay/transrec',
		    'merchant_id' => "esewa@broadlink.com.np"
		],
		'mode' => 'live'
	],
	'vat' => '0.13'
];