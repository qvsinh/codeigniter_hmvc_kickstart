<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    function run($module = '', $group = '') {
        (is_object($module)) AND $this->CI = & $module;
        return parent::run($group);
    }
    
    /*
     * This function must set after run validate: $this->form_validation->run($this);
     */
    function set_message_by_field($field, $message) {
        if($this->_error_array[$field]){
            $this->_error_array[$field] = $message;
        }
    }

}

/* End of file MY_Form_validation.php */
/* Location: ./application/libraries/MY_Form_validation.php */ 