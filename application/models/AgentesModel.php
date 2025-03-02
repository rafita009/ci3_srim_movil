    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class AgentesModel extends CI_Model {
        public function __construct() {
            parent::__construct();
        }

        public function getAgentes()
        {
            $query = $this->db->query("SELECT * FROM tab_agentes");
            return $query->result();
        }

      
    }       