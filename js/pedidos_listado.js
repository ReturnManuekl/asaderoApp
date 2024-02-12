new Vue({
  el: "#pedidosListadoSection",
  data: {
    filtroEstado: 'todos',
    usuario: 'Andres',
    clave: '123',
    showMsgError: false,
    pedidos: [],
    pedidoSelec: [],
    estadoPedidoModal: ''
  },
  methods: {
    obtenerPedidos(){
      let _this = this;
      axios({
        method: 'get',
        url: 'obtener_listado',
      })
      .then(function (response) {
        _this.pedidos = response.data;
      });
    },
    nuevoPedido(){
      window.location.href = "../pedidos/nuevo_pedido";
    },
    formatoHora(hora){
      let separaHora = hora.split(':');
      return separaHora[0]+':'+separaHora[1];
    },
    seleccionarPedido(pedido){
      this.pedidoSelec = pedido;
      this.estadoPedidoModal = pedido.estado;
    },
    cambiarEstado(){
      let indexPedido = this.pedidos.findIndex(item => item.id == this.pedidoSelec.id);
      this.pedidos[indexPedido].estado = this.estadoPedidoModal;
      this.actualizarEstado();
    },
    actualizarEstado(){
      axios.post('../pedidos/actualizarEstadoPedido', {
        idPedido: this.pedidoSelec.id,
        nuevoEstado: this.pedidoSelec.estado
      })
      .then(function (response) {
        console.log(response)
      })
      .catch(function (error) {
        console.log(error);
      });
    }
  },
  mounted() {
    this.obtenerPedidos();
  },
  computed: {
    // a computed getter
    pedidosFiltrados() {
      // `this` points to the component instance
      if(this.filtroEstado == 'todos'){
        return this.pedidos;
      }else{
        return this.pedidos.filter(item => item.estado == this.filtroEstado);
      }
    }
  }
  
})