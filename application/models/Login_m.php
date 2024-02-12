<?php
    class Login_m extends CI_Model {

        public function comparaUsuario($usuario, $clave){
            $this->load->database();
            $result = $this->db->select('*')
            ->from('usuarios')
            ->where('usuario', $usuario)
            ->where('clave', $clave)
            ->get()->num_rows();
            return $result > 0;
        }
    }
?>