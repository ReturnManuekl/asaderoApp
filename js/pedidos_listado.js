new Vue({
  el: "#pedidosListadoSection",
  data: {
    diaFiltro: '',
    filtroEstado: 'todos',
    pedidos: [],
    pedidoSelec: [],
    estadoPedidoModal: ''
  },
  methods: {
    obtenerPedidos(){
      this.diaFiltro = this.diaFiltro == '' ? new Date().toISOString().split('T')[0] : this.diaFiltro;
      let _this = this;
      axios({
        method: 'get',
        url: 'obtener_listado/' + this.diaFiltro,
      })
      .then(function (response) {
        _this.pedidos = response.data;
      });
    },
    nuevoPedido(){
      window.location.href = "../pedidos/nuevo_pedido";
    },
    formatoHora(hora){ 
      if(hora != undefined){
        let separaHora = hora.split(':'), horaFormateada = '';
        if(separaHora[0] < 13){
          horaFormateada = separaHora[0] + ':' + separaHora[1] ;
          horaFormateada += separaHora[0] == 12 ? ' pm' : ' am';
        } else { 
          separaHora[0] -= 12;
          horaFormateada = separaHora[0] + ':' + separaHora[1] + ' pm';
        }
        return horaFormateada;
      }
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
    },
    eliminarPedido(){
      let _this = this;
      axios.post('../pedidos/actualizarEstadoPedido', {
        idPedido: this.pedidoSelec.id,
        nuevoEstado: 'eliminado'
      })
      .then(function (response) {
        let indexPedido = _this.pedidos.findIndex(item => item.id == _this.pedidoSelec.id);
        _this.pedidos[indexPedido].estado = 'eliminado';
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
    pedidosFiltrados() {
      if(this.filtroEstado == 'todos'){
        return this.pedidos.filter(item => item.estado != 'eliminado');;
      }else{
        return this.pedidos.filter(item => item.estado == this.filtroEstado);
      }
    }
  }
  
})