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
    }
  },
  /* mounted() {
    this.agregarItem();
  }*/
  
})