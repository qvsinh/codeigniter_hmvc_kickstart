<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Login extends Frontend_Controller {

    function __construct() {
        parent::__construct();        
        $this->load->model('auth_model');
        // $this->lang->load('form_validation', $this->session->userdata('site_lang'));
    }

    public function index() {
        $this->do_login();

        $this->template->add_asset('signin.css');
        $this->template->set_title("CI hmvc smarty support");
        $this->template->set_description("CI hmvc smarty support");
        
        $this->template->set_layout("public_layout");
        $this->template->view('auth/vlogin');
    }

    function do_login() {
        if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->input->post('doaction') == 'login') {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('email', '', 'trim|required|valid_email|xss_clean');
            $this->form_validation->set_rules('password', '', 'trim|required|min_length[6]|xss_clean');

            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $password_md5 = md5($password);
            $remember_login = intval($this->input->post('chk_remember'));

            if ($this->form_validation->run($this) == FALSE) {
                $this->template->data['login_error'] = 1;
            } else {
                $arr_client = $this->auth_model->login($email, $password_md5);
                if ($arr_client['email']) {
                    $this->session->set_userdata('member', $arr_client);
                    //Set remember login
                    if ($remember_login == 1) {
                        $cookie_email = $this->encrypt->encode($email);
                        $cookie_password = $this->encrypt->encode($password);
                        $str_cookie_value = $this->encrypt->encode(json_encode(array('email' => $cookie_email, 'password' => $cookie_password)));
                        $cookie_remember_login = array(
                            'name' => 'remember_login',
                            'value' => $str_cookie_value,
                            'expire' => 60 * 60 * 24 * 30// expire in 30 days
                        );
                        $this->input->set_cookie($cookie_remember_login);
                    } else {
                        $cookie_remember_login = array(
                            'name' => 'remember_login',
                            'value' => '',
                            'expire' => ''
                        );
                        $this->input->set_cookie($cookie_remember_login);
                    }
                    redirect(base_url());
                } else {
                    $this->template->data['login_error'] = 1;
                }
            }
            $this->template->data['post'] = $_POST;
        }
    }

    function logout() {
        $this->session->unset_userdata('member');
        $cookie_remember_login = array(
            'name' => 'remember_login',
            'value' => '',
            'expire' => ''
        );
        $this->input->set_cookie($cookie_remember_login);
        redirect(base_url());
    }
    
}
