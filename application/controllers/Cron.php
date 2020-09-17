<?php

	class Cron extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
	    }
	    
	    public function updateCurrencyRates($value='') {
	        $insertArr = array();
	        $resp = curlGet();
	        if(!empty($resp)) {
	            $exchangeRate = json_decode($resp,true);
	            $i = 0;
	            foreach ($exchangeRate['rates'] as $rk => $rv) {
	                $insertArr[$i]['base'] = $exchangeRate['base'];
	                $insertArr[$i]['abbr'] = $rk;
	                $insertArr[$i]['rate'] = $rv;
	                $insertArr[$i]['created_at'] = date('Y-m-d H:i:s');
	                $insertArr[$i]['updated_at'] = date('Y-m-d H:i:s');
	                $i++;
	            }
	            if(!empty($exchangeRate)) {
	                $this->CurrencyRate->batchUpdateRate($insertArr);
	                return true;
	            }
	        } else {
	            return false;
	        }
	    }
	}
