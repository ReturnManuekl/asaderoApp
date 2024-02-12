<?php
    class Pedidos_m extends CI_Model {

        public function listadoPedidos(){
            $this->load->database();
            $result = $this->db->select('*')
            ->from('pedidos')
            ->get()->result_array();
            return $result;
        }

        public function actualizarEstadoPedido($idPedido,$nuevoEstado){
            $this->load->database();
            $data = array(
                'estado' => $nuevoEstado,
            );
            $this->db->where('id', $idPedido);
            $this->db->update('pedidos', $data);
            return true;
        }
    }
?>