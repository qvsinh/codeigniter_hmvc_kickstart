<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Auth_model extends Base_Model {

    function __construct() {
        parent::__construct();
    }

    function login($email, $password) {
        if($email=='qvsinh@gmail.com' && $password==md5('012345678')){
            return array('email'=>$email, 'password'=>$password);
        }else{
            return array();
        }
    }
    
}

