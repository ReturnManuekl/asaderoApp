<?php
    class Pedidos_m extends CI_Model {

        public function listadoPedidos($fecha){
            $this->load->database();
            $result = $this->db->select('*')
            ->from('pedidos')
            ->where('dia_creacion', $fecha)
            ->order_by('estado DESC')
            ->order_by('hora_entrega ASC')
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

        public function agregarPedidoM($datos){
            $this->load->database();
            $this->db->insert('pedidos', $datos);
            return true;
        }
    }
?>