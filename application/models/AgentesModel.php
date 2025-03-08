    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class AgentesModel extends CI_Model {
        private $table = 'tab_agentes';


        public function __construct() {
            parent::__construct();
            $this->load->database();

        }

        public function getAgentes()
        {
            $query = $this->db->query("SELECT * FROM tab_agentes");
            return $query->result();
        }

        public function getAgentesActivos() {
            $this->db->where('ACTIVO', 1);
            $this->db->order_by('NOMBRES_ACT', 'ASC');
            $this->db->order_by('APELLIDOS_ACT', 'ASC');
            $this->db->order_by('NRO_ACT', 'ASC');
            $query = $this->db->get($this->table);
            
            return ($query->num_rows() > 0) ? $query->result_array() : array();
        }
    
        public function getAgentesEliminados() {
            $this->db->where('ACTIVO', 0);
            $this->db->order_by('NOMBRES_ACT', 'ASC');
            $this->db->order_by('APELLIDOS_ACT', 'ASC');
            $this->db->order_by('NRO_ACT', 'ASC');  
            $query = $this->db->get($this->table);
            return $query->result_array();
        }
    
        public function getAgenteById($id_agente) {
            $this->db->where('ID_AGENTE', $id_agente);  
            $query = $this->db->get($this->table);
            return $query->row_array();
        }
    
        public function agregarAgente($nombre_agente, $apellidos_agente, $nro_agente) {
            $data = [
                'NOMBRES_ACT' => $nombre_agente,
                'APELLIDOS_ACT' => $apellidos_agente,
                'NRO_ACT' => $nro_agente,   
                'ACTIVO' => 1
            ];
            return $this->db->insert($this->table, $data);
        }
        
        public function actualizarAgente($id_agente, $nombre_agente, $apellidos_agente, $nro_agente) {
            $data = [
                'NOMBRES_ACT' => $nombre_agente,
                'APELLIDOS_ACT' => $apellidos_agente,
                'NRO_ACT' => $nro_agente
            ];
            $this->db->where('ID_AGENTE', $id_agente);
            return $this->db->update($this->table, $data);
        }
        public function eliminarAgente($id_agente) {
            $this->db->where('ID_AGENTE', $id_agente);  
            return $this->db->update($this->table, ['ACTIVO' => 0]);
        }
    
        public function reactivarAgente($id_agente) {
            $this->db->where('ID_AGENTE', $id_agente);
            return $this->db->update($this->table, ['ACTIVO' => 1]);
        }
    
        public function existeAgente($nombreagente, $apellidosagente, $id_agente = null) {
            $this->db->where('NOMBRES_ACT', $nombreagente);
            $this->db->where('APELLIDOS_ACT', $apellidosagente);
            if ($id_agente) {
                $this->db->where('ID_AGENTE !=', $id_agente, false);
            }

            $query = $this->db->get($this->table);
            return $query->num_rows() > 0;
        }
        public function existeNumeroAgente($nroagente, $id_agente = null) {
            $this->db->where('NRO_ACT', $nroagente);
            if ($id_agente) {
                $this->db->where('ID_AGENTE !=', $id_agente, false);
            }
            $query = $this->db->get($this->table);
            return $query->num_rows() > 0;
        }
    
        public function buscarAgente($termino) {
            $this->db->like('NOMBRES_ACT', $termino);
            $this->db->like('APELLIDOS_ACT', $termino);
            $this->db->like('NRO_ACT', $termino);
            $this->db->where('ACTIVO', 1);
            $this->db->order_by('NOMBRE_ACT', 'ASC');
            $this->db->order_by('APELLIDOS_ACT', 'ASC');
            $this->db->order_by('NRO_ACT', 'ASC');
            $query = $this->db->get($this->table);
            return $query->result_array();
        }
    
        public function getTotalAgentesActivos() {
            $this->db->where('ACTIVO', 1);
            return $this->db->count_all_results($this->table);
        }
       // Verificar si existe un número de agente en otro registro
        public function existeNumeroAgenteEnOtro($nro_agente, $id_actual) {
            $this->db->where('NRO_ACT', $nro_agente);
            $this->db->where('ID_AGENTE !=', $id_actual);
            $query = $this->db->get($this->table);
            return $query->num_rows() > 0;
        }

       
    }
    