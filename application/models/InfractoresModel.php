<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InfractoresModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getInfractores()
    {
        $query = $this->db->query("SELECT * FROM infractores");
        return $query->result();
    }
}
?>