<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class IS_Controller extends CI_Controller {
    public $sessionData;
    public $siteTitle;
    public $siteLang;
    public $pageTitle;
    public $uriSegments;
    public $userMenus;
    public $currentMenu;
    
    public function __construct() {
        parent::__construct();
        $this->siteLang = 'he';
        $this->uriSegments = $this->uri->segment_array();
        $this->siteTitle = 'Catalogue';
        $this->pageTitle = 'Catalogue';
    }
}

class Routing_Controller extends IS_Controller {
    public function __construct() {
        parent::__construct();
        
        if(empty($this->uriSegments)) {
            redirect('/home');
        }

        switch (___getCurrentRoute()) {
            case '':
            case '/':
                redirect('home');
                break;

            case 'admin':
                redirect('admin/login');
                break;
        }
    }
}

class Admin_Controller extends Routing_Controller {

    public $menu;
    public function __construct() {
        parent::__construct();
        $this->islRate = $this->CurrencyRate->getRate('ILS','row_array');
        /*GETTING LANGUAGE*/
        if(!empty($this->session->userdata['adminData'])){
            $this->sessionData = ___userInfo($this->session->userdata['adminData']['id'],null);
            //$this->siteLang = empty($this->session->userdata['adminData']['site_lang']) ? constant('DEFAULT_LANGUAGE') : $this->session->userdata['adminData']['site_lang'];
            $this->siteLang = empty($this->session->userdata['adminData']['site_lang']) ? $this->siteLang : $this->session->userdata['adminData']['site_lang'];
        }
        $this->config->set_item('language', get_language($this->siteLang,'folder_name'));
        $this->lang->load($this->siteLang,get_language($this->siteLang,'folder_name'));
        //$this->lang->load('form_validation_lang',get_language($this->siteLang,'folder_name'));
        $that =& get_instance();
        $this->siteTitle = $that->lang->line('HEADER_TITLE');
        $this->pageTitle = $that->lang->line('PAGE_TITLE');
    }
}

class AdminAjax_Controller extends IS_Controller {

    public function __construct() {
        parent::__construct();
        $isAjax = $this->input->is_ajax_request();
    }
}


class Front_Controller extends Routing_Controller {

    public function __construct() {
        parent::__construct();
        $this->islRate = $this->CurrencyRate->getRate('ILS','row_array');

        $tempLogin = (___config('temp_login','value') == 'Yes');
        if($tempLogin){
            if(empty($_SESSION['temp_auth']) && $this->uriSegments[1] != 'temp-login') {
                redirect('temp-login');
            } 
        } /*else {
            $_SESSION['temp_auth'] = true;
        }*/
        
        /*GETTING LANGUAGE*/
        // $this->session->set_userdata('userData',array('site_lang'=>'en'));
        if(!empty($this->session->userdata['userData'])){
            if(count($this->session->userdata['userData'])>1){
                $this->sessionData = ___userInfo($this->session->userdata['userData']['id'],null);
            }
            // $this->sessionData = ___userInfo($this->session->userdata['userData']['id'],null);
            //$this->siteLang = empty($this->session->userdata['userData']['site_lang']) ? constant('DEFAULT_LANGUAGE') : $this->session->userdata['userData']['site_lang'];
            $this->siteLang = empty($this->session->userdata['userData']['site_lang']) ? $this->siteLang : $this->session->userdata['userData']['site_lang'];
        }
        $this->config->set_item('language', get_language($this->siteLang,'folder_name'));
        $this->lang->load($this->siteLang,get_language($this->siteLang,'folder_name'));
        //$this->lang->load('form_validation_lang',get_language($this->siteLang,'folder_name'));
        $that =& get_instance();
        $this->siteTitle = $that->lang->line('HEADER_TITLE');
        $this->pageTitle = $that->lang->line('PAGE_TITLE');
    }
}
