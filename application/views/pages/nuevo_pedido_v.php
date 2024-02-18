<div class="container-fluid bg-naranja" id="nuevoPedidoSection">
    <div class="d-flex flex-column align-items-center pt-5 pb-2" >
        <h1 class="text-center mt-5 mb-3 text-white w-100">Nuevo Pedido</h1>
        <div class="d-flex justify-content-start w-100 mb-2">
            <button class="btn btn-light w-auto fw-bold" @click="regresar()">Regresar</button>
        </div>
        <div class="total-header fixed-top container-fluid pt-0">
            <div class="bg-white px-3 py-4 d-flex justify-content-between align-items-center rounded-bottom shadow border-bottom border-5 border-primary">
                <h4 class="fw-bold mb-0">Total: </h4>
                <h4 class="fw-bold mb-0">{{total.toLocaleString('es-MX', {style: 'currency',currency: 'MXN',})}}</h4>
            </div>
        </div>
        <div class="bg-white form-contenedor p-3 rounded-3 shadow w-100 mb-4">
            <h3 class="bg-dark bg-gradient text-center rounded text-white py-3  mb-2">Paquetes</h3>
            <div class="row my-2 justify-content-center">
                <div class="col-6 col-sm-4 my-2">
                    <p class="texto-paquete text-center w-100"> Paquete 1</p>
                    <div class="NPP-contenedor-boton shadow-sm rounded border border-4" :class="contadorPaquete1 > 0 ? 'border-primary-subtle' : 'border-transparent'">
                        <button class="btn btn-light" @click="restarItem('Paquete 1')" :disabled='contadorPaquete1 == 0'>-</button>
                        <div class="d-flex flex-column align-items-center">
                            <p class="contador-items border-bottom border-3 py-3 mb-3" :class="contadorPaquete1 > 0 ? 'border-primary-subtle' : 'border-transparent'">{{contadorPaquete1}}</p>
                            <p class="mb-0">{{(contadorPaquete1 * 175).toLocaleString('es-MX', {style: 'currency',currency: 'MXN',})}}</p>
                        </div>
                        <button class="btn btn-light" @click="agregarItem('Paquete 1')">+</button>
                    </div>
                </div>
                <div class="col-6 col-sm-4 my-2">
                    <p class="texto-paquete text-center w-100"> Paquete 2</p>
                    <div class="NPP-contenedor-boton shadow-sm rounded border border-4" :class="contadorPaquete2 > 0 ? 'border-primary-subtle' : 'border-transparent'">
                        <button class="btn btn-light" @click="restarItem('Paquete 2')" :disabled='contadorPaquete2 == 0'>-</button>
                        <div class="d-flex flex-column align-items-center">
                            <p class="contador-items border-bottom border-3 py-3 mb-3" :class="contadorPaquete2 > 0 ? 'border-primary-subtle' : 'border-transparent'">{{contadorPaquete2}}</p>
                            <p class="mb-0">{{(contadorPaquete2 * 239).toLocaleString('es-MX', {style: 'currency',currency: 'MXN',})}}</p>
                        </div>
                        <button class="btn btn-light" @click="agregarItem('Paquete 2')">+</button>
                    </div>
                </div>
                <div class="col-6 col-sm-4 my-2">
                    <p class="texto-paquete text-center w-100"> Paquete 3</p>
                    <div class="NPP-contenedor-boton shadow-sm rounded border border-4" :class="contadorPaquete3 > 0 ? 'border-primary-subtle' : 'border-transparent'">
                        <button class="btn btn-light" @click="restarItem('Paquete 3')" :disabled='contadorPaquete3 == 0'>-</button>
                        <div class="d-flex flex-column align-items-center">
                            <p class="contador-items border-bottom border-3 py-3 mb-3" :class="contadorPaquete3 > 0 ? 'border-primary-subtle' : 'border-transparent'">{{contadorPaquete3}}</p>
                            <p class="mb-0">{{(contadorPaquete3 * 299).toLocaleString('es-MX', {style: 'currency',currency: 'MXN',})}}</p>
                        </div>
                        <button class="btn btn-light" @click="agregarItem('Paquete 3')">+</button>
                    </div>
                </div>
                <!--<div class="col-6 col-sm-4">
                    <div class="h-100 w-100 btn btn-primary" @click.self="agregarItem('Paquete 2')">
                        Paquete 2
                        <p v-if="contadorPaquete2 > 0">
                            <button class="btn" @click="restarItem('Paquete 2')">-</button>
                            {{contadorPaquete2}}
                            <button class="btn" @click="agregarItem('Paquete 2')">+</button>
                        </p>
                    </div>
                </div>--> 
            </div>
            <h3 class="bg-dark bg-gradient text-center rounded text-white py-3 mt-4 mb-2">Productos extra</h3>
            <div class="row my-2 justify-content-center">
                <div class="col-6 col-sm-4 my-2">
                    <p class="texto-paquete text-center w-100"> Tacos</p>
                    <div class="NPP-contenedor-boton shadow-sm rounded border border-4" :class="contadorTaco > 0 ? 'border-danger-subtle' : 'border-transparent'">
                        <button class="btn btn-light" @click="restarItem('taco')" :disabled='contadorTaco == 0'>-</button>
                        <div class="d-flex flex-column align-items-center">
                            <p class="contador-items border-bottom border-3 py-3 mb-3" :class="contadorTaco > 0 ? 'border-danger-subtle' : 'border-transparent'">{{contadorTaco}}</p>
                            <p class="mb-0">{{(contadorTaco * 6).toLocaleString('es-MX', {style: 'currency',currency: 'MXN',})}}</p>
                        </div>
                        <button class="btn btn-light" @click="agregarItem('taco')">+</button>
                    </div>
                </div>
                <div class="col-6 col-sm-4 my-2">
                    <p class="texto-paquete text-center w-100"> 1 Pollo</p>
                    <div class="NPP-contenedor-boton shadow-sm rounded border border-4" :class="contadorPollo > 0 ? 'border-danger-subtle' : 'border-transparent'">
                        <button class="btn btn-light" @click="restarItem('pollo')" :disabled='contadorPollo == 0'>-</button>
                        <div class="d-flex flex-column align-items-center">
                            <p class="contador-items border-bottom border-3 py-3 mb-3" :class="contadorPollo > 0 ? 'border-danger-subtle' : 'border-transparent'">{{contadorPollo}}</p>
                            <p class="mb-0">{{(contadorPollo * 145).toLocaleString('es-MX', {style: 'currency',currency: 'MXN',})}}</p>
                        </div>
                        <button class="btn btn-light" @click="agregarItem('pollo')">+</button>
                    </div>
                </div>
                <div class="col-6 col-sm-4 my-2">
                    <p class="texto-paquete text-center w-100"> 1/2 pollo</p>
                    <div class="NPP-contenedor-boton shadow-sm rounded border border-4" :class="contadorMedioPollo > 0 ? 'border-danger-subtle' : 'border-transparent'">
                        <button class="btn btn-light" @click="restarItem('medioPollo')" :disabled='contadorMedioPollo == 0'>-</button>
                        <div class="d-flex flex-column align-items-center">
                            <p class="contador-items border-bottom border-3 py-3 mb-3" :class="contadorMedioPollo > 0 ? 'border-danger-subtle' : 'border-transparent'">{{contadorMedioPollo}}</p>
                            <p class="mb-0">{{(contadorMedioPollo * 85).toLocaleString('es-MX', {style: 'currency',currency: 'MXN',})}}</p>
                        </div>
                        <button class="btn btn-light" @click="agregarItem('medioPollo')">+</button>
                    </div>
                </div>
                <div class="col-6 col-sm-4 my-2">
                    <p class="texto-paquete text-center w-100"> 1/4 pollo</p>
                    <div class="NPP-contenedor-boton shadow-sm rounded border border-4" :class="contadorCuartoPollo > 0 ? 'border-danger-subtle' : 'border-transparent'">
                        <button class="btn btn-light" @click="restarItem('cuartoPollo')" :disabled='contadorCuartoPollo == 0'>-</button>
                        <div class="d-flex flex-column align-items-center">
                            <p class="contador-items border-bottom border-3 py-3 mb-3" :class="contadorCuartoPollo > 0 ? 'border-danger-subtle' : 'border-transparent'">{{contadorCuartoPollo}}</p>
                            <p class="mb-0">{{(contadorCuartoPollo * 65).toLocaleString('es-MX', {style: 'currency',currency: 'MXN',})}}</p>
                        </div>
                        <button class="btn btn-light" @click="agregarItem('cuartoPollo')">+</button>
                    </div>
                </div>
                <div class="col-6 col-sm-4 my-2">
                    <p class="texto-paquete text-center w-100"> Refresco</p>
                    <div class="NPP-contenedor-boton shadow-sm rounded border border-4" :class="contadorRefresco > 0 ? 'border-danger-subtle' : 'border-transparent'">
                        <button class="btn btn-light" @click="restarItem('refresco')" :disabled='contadorRefresco == 0'>-</button>
                        <div class="d-flex flex-column align-items-center">
                            <p class="contador-items border-bottom border-3 py-3 mb-3" :class="contadorRefresco > 0 ? 'border-danger-subtle' : 'border-transparent'">{{contadorRefresco}}</p>
                            <p class="mb-0">{{(contadorRefresco * 30).toLocaleString('es-MX', {style: 'currency',currency: 'MXN',})}}</p>
                        </div>
                        <button class="btn btn-light" @click="agregarItem('refresco')">+</button>
                    </div>
                </div>
                <div class="col-6 col-sm-4 my-2">
                    <p class="texto-paquete text-center w-100"> Complemento </p>
                    <div class="NPP-contenedor-boton shadow-sm rounded border border-4" :class="contadorComplemento > 0 ? 'border-danger-subtle' : 'border-transparent'">
                        <button class="btn btn-light" @click="restarItem('complemento')" :disabled='contadorComplemento == 0'>-</button>
                        <div class="d-flex flex-column align-items-center">
                            <p class="contador-items border-bottom border-3 py-3 mb-3" :class="contadorComplemento > 0 ? 'border-danger-subtle' : 'border-transparent'">{{contadorComplemento}}</p>
                            <p class="mb-0">{{(contadorComplemento * 10).toLocaleString('es-MX', {style: 'currency',currency: 'MXN',})}}</p>
                        </div>
                        <button class="btn btn-light" @click="agregarItem('complemento')">+</button>
                    </div>
                </div>
            </div>
            <h3 class="bg-dark bg-gradient text-center rounded text-white py-3 my-4">Datos del cliente</h3>
            <div class="mb-4">
                <label for="">Domicilio</label>
                <input type="text" class="form-control" v-model="domicilio" @click="limpiarInputDomi()">
            </div>
            <div class="mb-4">
                <label for="">Hora de entrega</label>
                <input type="time" class="form-control" v-model="hora_entrega">
            </div>
            <div class="mb-5">
                <label for="">Cliente *</label>
                <input type="text" class="form-control" v-model="cliente" v-on:keyup="validacion()">
            </div>
            <button class="btn btn-primary w-100 btn-lg" @click="enviarPedido()" :disabled="botonDeshabilitado">Crear pedido</button>
        </div>
    </div>
</div>
<script src="<?= base_url('/js/nuevo_pedido.js')?>"></script>