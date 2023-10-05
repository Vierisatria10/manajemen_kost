<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class Template {
    var $template_data = array();

    function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }

    function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
    {
        $this->CI =& get_instance();
        // $SESSION_ID = $this->CI->session->userdata('user_id');
        // $view_data['SESSION'] = $this->CI->db->where('user_id', $SESSION_ID)->get('mikir.user')->row();
        $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($template, $this->template_data, $return);
    }
}
