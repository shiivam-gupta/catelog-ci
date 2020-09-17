<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	function productCategory($index = '') {
		$CI =& get_instance();
		$category = array(
			'Mezuza' => $CI->lang->line('MEZUZUA_LABEL'),
			'Tefilin' => $CI->lang->line('TEFILIN_LABEL'),
			'Torah' => $CI->lang->line('TORAH_LABEL'),
			'Megila' => $CI->lang->line('MEGILA_LABEL'),
			'Other'	=>	$CI->lang->line('OTHER_LABEL')
	    );
		if(!empty($index)){
			return $category[$index];
		}else{
			return $category;
		}
	}

	function orderStatus($index = '') {
		$CI =& get_instance();
		$status = array(
			'new' => array(
				'title'=>$CI->lang->line('NEW_STATUS_LABEL'),
				'color'=>'#5668e6'
			),
			'in progress' => array(
				'title'=>$CI->lang->line('INPROGRESS_STATUS_LABEL'),
				'color'=>'#ebef25fa'
			),
			'complete' => array(
				'title'=>$CI->lang->line('COMPLETE_STATUS_LABEL'),
				'color'=>'#f38412'
			),
			'delivered' => array(
				'title'=>$CI->lang->line('DELIVERED_STATUS_LABEL'),
				'color'=>'#09c142'
			),
			'canceled' => array(
				'title'=>$CI->lang->line('CANCELED_STATUS_LABEL'),
				'color'=>'#f71616fa'
			)
	    );
		if(!empty($index)){
			return $status[$index];
		}else{
			return $status;
		}
	}

	function productType($index = '') {
		$CI =& get_instance();
		$type = array(
			'Rashi' => $CI->lang->line('RASHI_LABEL'),
			'Rtam' => $CI->lang->line('RTAM_LABEL')
	    );
		if(!empty($index)){
			return $type[$index];
		}else{
			return $type;
		}
	}

	function productKtav($index = '') {
		$CI =& get_instance();
		$ktav = array(
			'Sfaradi' => $CI->lang->line('SFARDI_LABEL'),
			'Ari' => $CI->lang->line('ARI_LABEL'),
			'BeitYosef' => $CI->lang->line('BEITYOSEF_LABEL'),
			'Chabad' => $CI->lang->line('CHABAD_LABEL')
	    );
		if(!empty($index)){
			return $ktav[$index];
		}else{
			return $ktav;
		}
	}

	function productKtavSize($index = '') {
		$CI =& get_instance();
		$ktavSize = array(
			'10' => $CI->lang->line('10_LABEL'),
			'12' => $CI->lang->line('12_LABEL'),
			'15' => $CI->lang->line('15_LABEL'),
			'24' => $CI->lang->line('24_LABEL'),
			'30' => $CI->lang->line('30_LABEL'),
			'36' => $CI->lang->line('36_LABEL'),
			'42' => $CI->lang->line('42_LABEL'),
			'48' => $CI->lang->line('48_LABEL'),
			'56' => $CI->lang->line('56_LABEL'),
			'Chabad' => $CI->lang->line('CHABAD_LABEL'),
			'Czonish' => $CI->lang->line('CZONISH__LABEL')
	    );
		if(!empty($index)){
			return $ktavSize[$index];
		}else{
			return $ktavSize;
		}
	}

	function productLines($index = '') {
		$CI =& get_instance();
		$lines = array(
			'11' => $CI->lang->line('11_LABEL'),
			'21' => $CI->lang->line('21_LABEL'),
			'28' => $CI->lang->line('28_LABEL'),
			'42' => $CI->lang->line('42_LABEL')
	    );
		if(!empty($index)){
			return $lines[$index];
		}else{
			return $lines;
		}
	}

	function productLineSize($index = '') {
		$CI =& get_instance();
		$lineSize = array(
			'5' => $CI->lang->line('5_LABEL'),
			'8' => $CI->lang->line('8_LABEL'),
			'10' => $CI->lang->line('10_LABEL')
	    );
		if(!empty($index)){
			return $lineSize[$index];
		}else{
			return $lineSize;
		}
	}

	function _yn($index = '') {
		$that = & get_instance();
		$yn = array(
			'Yes' => $that->lang->line('YES_LABEL'),
			'No' => $that->lang->line('NO_LABEL'),
	    );
		if(!empty($index)){
			return $yn[$index];
		}else{
			return $yn;
		}
	}


	function __mezuzot($index = '') {
		$CI =& get_instance();
		$mezuzot = array(
			'1'=>$CI->lang->line('1_LABEL'),
			'2'=>$CI->lang->line('2_LABEL'),
			'3'=>$CI->lang->line('3_LABEL'),
			'4'=>$CI->lang->line('4_LABEL'),
			'5'=>$CI->lang->line('5_LABEL'),
			'6'=>$CI->lang->line('6_LABEL'),
			'7'=>$CI->lang->line('7_LABEL'),
			'8'=>$CI->lang->line('8_LABEL'),
			'9'=>$CI->lang->line('9_LABEL'),
			'10'=>$CI->lang->line('10_LABEL')
	    );
		if(!empty($index)){
			return $mezuzot[$index];
		}else{
			return $mezuzot;
		}
	}

	function __parshiot($index = '') {
		$CI =& get_instance();
		$parshiot = array(
			'0.5'=>$CI->lang->line('0.5_LABEL'),
			'1'=>$CI->lang->line('1_LABEL')
	    );
		if(!empty($index)){
			return $parshiot[$index];
		}else{
			return $parshiot;
		}
	}

	function __amudim($index = '') {
		$CI =& get_instance();
		$amudim = array(
			'1'=>$CI->lang->line('1_LABEL'),
			'2'=>$CI->lang->line('2_LABEL'),
			'3'=>$CI->lang->line('3_LABEL'),
			'4'=>$CI->lang->line('4_LABEL')
	    );
		if(!empty($index)){
			return $amudim[$index];
		}else{
			return $amudim;
		}
	}

	function _priceFilter($indexs = array(),$alias = 'prod',$query=false) {
		//_priceFilter([1,2],'prod',true);
		$CI =& get_instance();
		$arrayIndex = array();
		$priceFilter = array(
			'1'=>array(
				'text'=>'Under '.get_language($CI->siteLang,'currencySymbol').' 1,000',
				'query'=>sprintf(' (%s.priceindollar < 1000) ',$alias)
			),
			'2'=>array(
				'text'=>get_language($CI->siteLang,'currencySymbol').' 1,000 - '.get_language($CI->siteLang,'currencySymbol').' 5,000',
				'query'=>sprintf(' (%s.priceindollar >= 1000 AND %s.priceindollar <= 5000) ',$alias,$alias)
			),
			'3'=>array(
				'text'=>get_language($CI->siteLang,'currencySymbol').' 5,000 - '.get_language($CI->siteLang,'currencySymbol').' 10,000',
				'query'=>sprintf(' (%s.priceindollar >= 5000 AND %s.priceindollar <= 10000) ',$alias,$alias)
			),
			'4'=>array(
				'text'=>get_language($CI->siteLang,'currencySymbol').' 10,000 - '.get_language($CI->siteLang,'currencySymbol').' 20,000',
				'query'=>sprintf(' (%s.priceindollar >= 10000 AND %s.priceindollar <= 20000) ',$alias,$alias)
			),
			'5'=>array(
				'text'=>get_language($CI->siteLang,'currencySymbol').' 20,000 - '.get_language($CI->siteLang,'currencySymbol').' 30,000',
				'query'=>sprintf(' (%s.priceindollar >= 20000 AND %s.priceindollar <= 30000) ',$alias,$alias)
			),
			'6'=>array(
				'text'=>'Over '.get_language($CI->siteLang,'currencySymbol').' 30,000',
				'query'=>sprintf(' (%s.priceindollar >= 30000) ',$alias)
			)
	    );
		if(!empty($indexs)){
			foreach ($priceFilter as $pfk => $pfv) {
				if(in_array($pfk, $indexs)) {
					$arrayIndex[] = $pfv;
				}
			}
			if($query) {
				$conditionArr = array_column($arrayIndex, 'query');
				$query = '('.implode(' OR ', $conditionArr).')';
				return $query;
			}
			return $arrayIndex;
		}else{
			return $priceFilter;
		}
	}