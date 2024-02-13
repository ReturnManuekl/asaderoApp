new Vue({
  el: "#loginSection",
  data: {
    usuario: 'Andres',
    clave: '123',
    showMsgError: false
  },
  methods: {
    verificarUsuario(){
      let _this = this;
      axios.post('index.php/Login/verificarLogin', {
        usuario: this.usuario,
        clave: this.clave
      })
      .then(function (response) {
        let result = response.data.result;
        if(result){
          window.location.href = "./index.php/pedidos/listado";
        }else{
          _this.showMsgError = true;
        }
      })
      .catch(function (error) {
        console.log(error);
      });
    }
  }
  
})