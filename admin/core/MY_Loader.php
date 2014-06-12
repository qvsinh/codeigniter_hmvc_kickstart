<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH . "third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {

    public function __construct() {
        parent::__construct();
        $this->_ci_view_paths = array(ROOTPATH . "admin/themes/" => TRUE) + $this->_ci_view_paths;
    }
}

