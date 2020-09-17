<?php

	if (!defined('BASEPATH')) exit('No direct script access allowed');

	function get_language($lang = 'en',$type = ""){
		$language = $array = array(
			'en' => array(
				'name' => 'English',
				'folder_name' => 'english',
				'dir' => 'ltr',
				'currency'=>'USD',
				'currencyColumn'=>'priceindollar',
				'currencySymbol'=>'$',
			),
			'he' => array(
				'name' => 'עברית',
				'folder_name' => 'hebrew',
				'dir' => 'rtl',
				'currency'=>'ILS',
				'currencyColumn'=>'priceinshekel',
				'currencySymbol'=>'₪',
			),
	    );

		if(!empty($type)){
			return $language[$lang][$type];
		}else{
			return $language;
		}
	}

	function convertCurrency($currency='USD',$amount) {
		$CI =& get_instance();
		$newAmount = $amount;
		switch ($currency) {
			case 'ILS':
				//$newAmount = round($CI->islRate['rate']*$amount,2);
				$newAmount = $CI->islRate['rate']*$amount;
				break;
			
			default:
				//$newAmount = round($amount,2);
				$newAmount = $amount;
				break;
		}
		return $newAmount;
	}
