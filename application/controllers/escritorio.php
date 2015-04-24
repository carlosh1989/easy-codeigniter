<?php
class Escritorio extends CI_Controller {
    
    
    public function __construct() {
        parent::__construct();
        $this->load->library('../controllers/recursos');
    }

    public function egresados_ver()
    {
    	$this->recursos->theme('escritorio','egresados','ver','');
    }
    
    
}
