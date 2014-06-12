<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Home extends Frontend_Controller {

    function __construct() {
        parent::__construct();
        // $this->load->model('home_model');
    }

    public function index() {
        $this->template->set_title($this->global_var['pos'] . " - Codeigniter HMVC Kickstart");
        $this->template->set_description($this->global_var['pos']);
        $this->template->add_asset("site.min.css");
        $this->template->add_asset("site.min.js");
        $this->template->set_layout("docs_layout");
        $this->template->view('home/vhome');
    }

}
