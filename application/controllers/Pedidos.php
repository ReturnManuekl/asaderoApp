<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function listado()
	{
		$this->load->view('components/header', true);
		$this->load->view('pages/pedidos_v');
		$this->load->view('components/footer', true);
	}

	public function nuevo_pedido(){
		$this->load->view('components/header', true);
		$this->load->view('pages/nuevo_pedido_v');
		$this->load->view('components/footer', true);
	}

	public function obtener_listado($fecha){
		$this->load->model('Pedidos_m');
		$listado = $this->Pedidos_m->listadoPedidos($fecha);
		echo json_encode($listado);
	}

	public function actualizarEstadoPedido(){
		$data = json_decode(file_get_contents('php://input'), true);
		$idPedido = $data['idPedido'];
		$nuevoEstado = $data['nuevoEstado'];
		$this->load->model('Pedidos_m');
		$resultado = $this->Pedidos_m->actualizarEstadoPedido($idPedido,$nuevoEstado);
		echo $resultado ? '{"result":true}' : '{"result":false}';
	}

	public function agregarPedido(){
		$data = json_decode(file_get_contents('php://input'), true);
		$datos = [
			'paquetes' => $data['paquetes'],
			'productos' => $data['productosExtra'],
			'domicilio' => $data['domicilio'],
			'nombre_persona' => $data['cliente'],
			'hora_creacion' => $data['hora_creacion'],
			'hora_entrega' => $data['hora_entrega'],
			'dia_creacion' => date("Y-m-d"),
			'total' => $data['total'],
			'estado' => 'preparando'
		];
		$this->load->model('Pedidos_m');
		$resultado = $this->Pedidos_m->agregarPedidoM($datos);
		echo $resultado ? '{"result":true}' : '{"result":false}';
	}
	
}
