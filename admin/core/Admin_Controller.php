<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

    public $global_var = array();

    function __construct() {
        parent::__construct();

        //set default timezone for site
        date_default_timezone_set($this->config->item('default_timezone'));

        //remember login
        $this->remember_login();

        //load global variable
        $this->load_global_var();

        //check device to using mobile theme or pc
        $this->detect_device();

        //check login
        if (!$this->is_login() && $this->router->class != 'login') {
            redirect(base_url('login'));
        }
        
    }

    function load_global_var() {
        $this->global_var = array(
            'pos' => $this->router->class . '.' . $this->router->method,
            'base_url' => base_url(),
            'current_url' => current_url(),
            'asset_url' => base_url() . 'themes/' . $this->template->theme . '/assets/',
            'css_url' => base_url() . 'themes/' . $this->template->theme . '/assets/css/',
            'img_url' => base_url() . 'themes/' . $this->template->theme . '/assets/img/',
            'js_url' => base_url() . 'themes/' . $this->template->theme . '/assets/js/'
        );
        $this->template->set('global_var', $this->global_var);
        $this->template->set('js_global_var', json_encode($this->global_var));
    }

    function detect_device() {
        if (isset($_GET['device'])) {
            $this->session->set_userdata('device', trim($_GET['device']));
        }
        if ($this->session->userdata('device') == 'mobile') {
            $this->template->theme = 'bootmin';
        } else {
            $this->template->theme = 'bootmin';
        }
    }

    function load_language() {
        if (!$this->session->userdata('site_lang')) {
            $this->session->set_userdata('site_lang', 'english');
        }
        if (isset($_GET['lang'])) {
            if (in_array(trim($_GET['lang']), $this->config->item('lang_available'))) {
                $this->session->set_userdata('site_lang', trim($_GET['lang']));
            }
        }
        $this->lang->load('main', $this->session->userdata('site_lang'));
    }

    function remember_login() {
        $admin = $this->session->userdata('admin');
        if (isset($_COOKIE['remember_login']) && !$admin) {
            $arr_remember = json_decode($this->encrypt->decode($this->input->cookie('remember_login')), true);
            $email = $this->encrypt->decode($arr_remember['email']);
            $password = md5($this->encrypt->decode($arr_remember['password']));
            $this->load->model('auth/auth_model');
            $arr_client = $this->auth_model->login($email, $password);
            if ($arr_client) {
                $this->session->set_userdata('admin', $arr_client);
            }
        }
    }

    function is_login() {
        $admin = $this->session->userdata('admin');
        if (!$admin) {
            return false;
        } else {
            return true;
        }
    }

}