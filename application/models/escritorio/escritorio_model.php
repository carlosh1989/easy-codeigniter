<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Escritorio_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    
    }

    public function hola()
    {
	  $query = $this->db->get('egresados');  
	  return $query->result();
    }
}
