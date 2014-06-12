<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * @author Sinh Quan <qvsinh@gmail.com>
 * @todo manage view, template in codeigniter
 */
class template {

    protected $ci;
    var $theme = "default";
    var $layout = "/layout/default_layout";
    var $data = array();
    var $compress_html_output = FALSE;

    function __construct() {
        $this->ci = & get_instance();
    }

    function set($name, $value) {
        $this->data[$name] = $value;
    }
    
    function set_title($value) {
        $this->data['html']['title'] = $value;
    }
    
    function set_description($value) {
        $this->data['html']['description'] = $value;
    }
    
    function set_keyword($value) {
        $this->data['html']['keyword'] = $value;
    }

    function set_layout($layout) {
        if ($layout) {
            $this->layout = "/layout/$layout";
        }
    }
    
    function include_layout($layout){
        $this->ci->load->view($this->theme . "/layout/$layout", array('view' => $this->data));
    }
    
    /**
    * @todo include view in same module
    * @example include_view('view_name');
    */
    function include_view($view_file){
        if ($this->compress_html_output) {
            $this->registerFilter('output', 'compress_html_output'); //compress_html_output function writen in base_helper.php
        }
        $this->ci->load->view($view_file, array('view' => $this->data));
    }

    /**
    * @todo include view in other module
    * @example include_module_view('module_name/view_name');
    */
    function include_module_view($view_file){
        if ($this->compress_html_output) {
            $this->registerFilter('output', 'compress_html_output'); //compress_html_output function writen in base_helper.php
        }
        $this->ci->load->view($this->theme . "/modules/$view_file", array('view' => $this->data));
    }
    

    function view($view_file = FALSE) {
        if ($view_file)
            $this->data['module_view'] = $this->theme . "/modules/$view_file";

        if ($this->compress_html_output) {
            $this->registerFilter('output', 'compress_html_output'); //compress_html_output function writen in base_helper.php
        }
        $this->ci->load->view($this->theme . $this->layout, array('view' => $this->data));
    }

    function get_view($view_file = FALSE) {
        if ($view_file) {
            $view_file = $this->theme . "/modules/$view_file";
            if ($this->compress_html_output) {
                $this->registerFilter('output', 'compress_html_output'); //compress_html_output function writen in base_helper.php
            }
            return $this->ci->load->view($view_file, array('view' => $this->data), TRUE);
        }
        return FALSE;
    }
    
    //add assets(js, css) files
    /**
    * @todo add assets(js, css) files. auto detect by file extension
    */
    function add_asset($file_path){
        if (is_array($file_path)) {
            foreach ($file_path as $file) {
                $file_path_temp = strtok($file, '?');
                $file_ext = strtolower(substr(strrchr($file_path_temp, '.'), 1));
                if($file_ext=='js'){
                    $this->data['html_assets']['more_js'][] = $file;
                }elseif($file_ext=='css'){
                    $this->data['html_assets']['more_css'][] = $file;
                }
            }
        } else {
            $file_path_temp = strtok($file_path, '?');
            $file_ext = strtolower(substr(strrchr($file_path_temp, '.'), 1));
            if($file_ext=='js'){
                $this->data['html_assets']['more_js'][] = $file_path;
            }elseif($file_ext=='css'){
                $this->data['html_assets']['more_css'][] = $file_path;
            }
        }
    }

}