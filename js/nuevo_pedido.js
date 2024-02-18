new Vue({
  el: "#nuevoPedidoSection",
  data: {
    productos: [],
    contadorPaquete1: 0,
    contadorPaquete2: 0,
    contadorPaquete3: 0,
    contadorTaco: 0,
    contadorPollo: 0,
    contadorMedioPollo: 0,
    contadorCuartoPollo: 0,
    contadorRefresco: 0, 
    contadorComplemento: 0,
    domicilio: 'Local',
    primeraVezDomi: true,
    hora_entrega: '',
    cliente: '',
    botonDeshabilitado: true,
    total: 0,
  },
  methods: {
    regresar(){
      window.location.href = "../pedidos/listado";
    },
    agregarItem(nombrePaquete){
      switch(nombrePaquete) {
        case "Paquete 1":
          this.contadorPaquete1++;
          this.total += 175;
        break;
        case "Paquete 2":
          this.contadorPaquete2++;
          this.total += 239;
        break;
        case "Paquete 3":
          this.contadorPaquete3++;
          this.total += 299;
        break;
        case "taco":
          this.contadorTaco++;
          this.total += 6;
        break;
        case "pollo":
          this.contadorPollo++;
          this.total += 145;
        break;
        case "medioPollo":
          this.contadorMedioPollo++;
          this.total += 85;
        break;
        case "cuartoPollo":
          this.contadorCuartoPollo++;
          this.total += 65;
        break;
        case "refresco":
          this.contadorRefresco++;
          this.total += 30;
        break;
        case "complemento":
          this.contadorComplemento++;
          this.total += 10;
        break;
      }
      this.validacion();
    },
    restarItem(nombrePaquete){
      switch(nombrePaquete) {
        case "Paquete 1":
          this.contadorPaquete1--;
          this.total -= 175;
        break;
        case "Paquete 2":
          this.contadorPaquete2--;
          this.total -= 239;
        break;
        case "Paquete 3":
          this.contadorPaquete3--;
          this.total -= 299;
        break;
        case "taco":
          this.contadorTaco--;
          this.total -= 6;
        break;
        case "pollo":
          this.contadorPollo--;
          this.total -= 145;
        break;
        case "medioPollo":
          this.contadorMedioPollo--;
          this.total -= 85;
        break;
        case "cuartoPollo":
          this.contadorCuartoPollo--;
          this.total -= 65;
        break;
        case "refresco":
          this.contadorRefresco--;
          this.total -= 30;
        break;
        case "complemento":
          this.contadorComplemento--;
          this.total -= 10;
        break;

      }
      this.validacion();
    },
    async setHoraEntrega(){
      var hours = new Date();
      hours.setHours(hours.getHours()+1); 
      this.hora_entrega = hours.toLocaleTimeString([],{hour: '2-digit', minute: '2-digit'});
    },
    enviarPedido(){
      let paquetes = '', productosExtra = '';
      paquetes += this.contadorPaquete1 > 0 ? this.contadorPaquete1 + ' x ( Paquete 1 ), ' : '' ;
      paquetes += this.contadorPaquete2 > 0 ? this.contadorPaquete2 + ' x ( Paquete 2 ), ' : '' ;
      paquetes += this.contadorPaquete3 > 0 ? this.contadorPaquete3 + ' x ( Paquete 3 ), ' : '' ;
      if(paquetes.length > 0) paquetes = paquetes.slice(0, -2);
      productosExtra += this.contadorTaco == 1 ? '1 Taco, ' : this.contadorTaco > 1 ? this.contadorTaco + ' Tacos, ' : '' ;
      productosExtra += this.contadorPollo == 1 ? '1 Pollo, ' : this.contadorPollo > 1 ? this.contadorPollo + ' Pollos, ' : '' ;
      productosExtra += this.contadorMedioPollo == 1 ? '1/2 Pollo, ' : this.contadorMedioPollo > 1 ? this.contadorMedioPollo + ' x ( 1/2 Pollo ), ' : '' ;
      productosExtra += this.contadorCuartoPollo == 1 ? '1/4 Pollo, ' : this.contadorCuartoPollo > 1 ? this.contadorCuartoPollo + ' x ( 1/4 Pollo ), ' : '' ;
      productosExtra += this.contadorRefresco == 1 ? '1 Refresco, ' : this.contadorRefresco > 1 ? this.contadorRefresco + ' Refrescos, ' : '' ;
      productosExtra += this.contadorComplemento == 1 ? '1 Complemento, ' : this.contadorComplemento > 1 ? this.contadorComplemento + ' Complementos, ' : '' ;
      if(productosExtra.length > 0) productosExtra = productosExtra.slice(0, -2);

      var hora_creacion = new Date();

      axios.post('./agregarPedido', {
        paquetes: paquetes,
        productosExtra: productosExtra,
        total: this.total,
        hora_creacion: hora_creacion.toLocaleTimeString(),
        hora_entrega: this.hora_entrega + ':00',
        domicilio: this.domicilio,
        cliente: this.cliente
      })
      .then(function(response){
        window.location.href = "./listado";
      }).catch(function (error) {
        console.log(error);
      });
    },
    validacion(){
      this.botonDeshabilitado = this.total == 0 || this.cliente == '';
    },
    limpiarInputDomi(){
      if(this.primeraVezDomi) this.domicilio = '';
    }
  },
  mounted() {
    this.setHoraEntrega();
  },
  
})