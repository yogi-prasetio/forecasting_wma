<?php

class Template {

	protected $_ci;

    function __construct(){        
        $this->_ci=&get_instance();
    }

	function load($template, $data=NULL){
		$data['_content'] = $this->_ci->load->view($template, $data, TRUE);
        $data['_header'] = $this->_ci->load->view('template/_header', $data, TRUE);
        $data['_menu'] = $this->_ci->load->view('template/_menu', $data, TRUE);
        $data['_footer'] = $this->_ci->load->view('template/_footer', $data, TRUE);
        $this->_ci->load->view('Template.php',$data, TRUE);
	}

}
