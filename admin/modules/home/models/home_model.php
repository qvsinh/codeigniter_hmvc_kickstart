<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Home_model extends Base_Model {

    var $tbl_name = 'article';

    function __construct() {
        parent::__construct();
    }

    function list_article($offset = 0, $limit = 20) {
        $sql = "SELECT * 
			FROM $this->tbl_name 
			WHERE 1  
			ORDER BY id DESC LIMIT $offset, $limit";
        $p_result = $this->db->query($sql)->result_array();

        return $p_result;
    }

}

