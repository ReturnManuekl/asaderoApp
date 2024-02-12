new Vue({
  el: "#nuevoPedidoSection",
  data: {
    usuario: 'Andres',
    clave: '123',
    showMsgError: false
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
          console.log
        });
    },
    regresar(){
      window.location.href = "../pedidos/listado";
    }
  },
  mounted() {
    //this.obtenerPedidos();
  }
  
})