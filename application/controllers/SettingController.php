<?php
defined('BASEPATH') || exit('No direct script access allowed');

class SettingController extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->pageTitle = $this->lang->line('SETTING_PAGE_TITLE');
        ___checkAdminLoginStatus();
    }

    public function allSetting($settingId='') {
        $updateArr = array();
        $data['settings'] = $this->Setting_model->getAllSettings();
        if($this->input->server('REQUEST_METHOD') === "POST") {
            $postData = $this->input->post();
            $settings = $data['settings'] = $postData['setting'];

            //$this->form_validation->set_rules('setting[percent_cost_price]', $this->lang->line('PERCENT_COST_PRICE'), 'trim|required|less_than_equal_to[100]');
            foreach ($settings as $sK => $sV) {
                switch ($sV['variable_name']) {
                    case 'percent_cost_price':
                        $this->form_validation->set_rules('setting['.$sK.'][value]', $this->lang->line($sV['label']), 'trim|required|less_than_equal_to[100]');
                        break;
                    default:
                        $this->form_validation->set_rules('setting['.$sK.'][value]', $this->lang->line($sV['label']), 'trim|required|max_length[50]');
                        break;
                }
            }
            
            if ($this->form_validation->run() == TRUE) {              

                $result = $this->Setting_model->updateBatchSetting($settings);
                if(!$result) {
                    $this->session->set_flashdata('flash_message', ['title'=>'','type'=>'error','text'=>$this->lang->line('SOMETHING_WENT_WRONG')]);
                } else {
                    $this->session->set_flashdata('flash_message', ['title'=>'','type'=>'success','text'=>$this->lang->line('SETTING_UPDATED')]);
                    redirect('admin/settings');
                }
            } /*else {
                pp(validation_errors());
            }*/
        }
        _renderAdminView('setting/list-edit',$data);
    }

}