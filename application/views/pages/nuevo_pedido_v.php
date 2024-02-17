<div class="container-fluid bg-naranja" id="nuevoPedidoSection">
    <div class="d-flex flex-column align-items-center vh-100" >
        <h1 class="text-center mt-5 mb-3 text-light w-100">Nuevo Pedido</h1>
        <div class="d-flex justify-content-start w-100 mb-2">
            <button class="btn btn-light w-auto fw-bold" @click="regresar()">Regresar</button>
        </div>
        <div class="bg-white form-contenedor px-3 py-4 rounded-3 shadow w-100">
            <h5>Paquetes</h5>
            <div class="row my-2 ">
                <div class="col-4">
                    <div class="h-100 w-100 btn btn-primary" @click.self="agregarItem('Paquete 1')">
                        Paquete 1
                        <p v-if="contadorPaquete1 > 0">
                            <button class="btn" @click="restarItem('Paquete 1')">-</button>
                            {{contadorPaquete1}}
                            <button class="btn" @click="agregarItem('Paquete 1')">+</button>
                        </p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="h-100 w-100 btn btn-primary" @click.self="agregarItem('Paquete 2')">
                        Paquete 2
                        <p v-if="contadorPaquete2 > 0">
                            <button class="btn" @click="restarItem('Paquete 2')">-</button>
                            {{contadorPaquete2}}
                            <button class="btn" @click="agregarItem('Paquete 2')">+</button>
                        </p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="h-100 w-100 btn btn-primary" @click.self="agregarItem('Paquete 3')">
                        Paquete 3
                        <p v-if="contadorPaquete3 > 0">
                            <button class="btn" @click="restarItem('Paquete 3')">-</button>
                            {{contadorPaquete3}}
                            <button class="btn" @click="agregarItem('Paquete 3')">+</button>
                        </p>
                    </div>
                </div>     
            </div>
            <h5>Productos extra</h5>
            <div class="row my-2">
                <div class="col-4 mb-2">
                    <div class="h-100 w-100 btn btn-primary" @click.self="agregarItem('taco')">
                        Taco
                        <p v-if="contadorTaco > 0">
                            <button class="btn" @click="restarItem('taco')">-</button>
                            {{contadorTaco}}
                            <button class="btn" @click="agregarItem('taco')">+</button>
                        </p>
                    </div>
                </div>
                <div class="col-4 mb-2">
                    <div class="h-100 w-100 btn btn-primary" @click.self="agregarItem('pollo')">
                        1 pollo                      
                        <p v-if="contadorPollo > 0">
                            <button class="btn" @click="restarItem('pollo')">-</button>
                            {{contadorPollo}}
                            <button class="btn" @click="agregarItem('pollo')">+</button>
                        </p>
                    </div>
                </div>
                <div class="col-4 mb-2">
                    <div class="h-100 w-100 btn btn-primary" @click.self="agregarItem('medioPollo')">
                        1/2 pollo
                        <p v-if="contadorMedioPollo > 0">
                            <button class="btn" @click="restarItem('medioPollo')">-</button>
                            {{contadorMedioPollo}}
                            <button class="btn" @click="agregarItem('medioPollo')">+</button>
                        </p>
                    </div>
                </div>
                <div class="col-4 mb-2">
                    <div class="h-100 w-100 btn btn-primary" @click.self="agregarItem('cuartoPollo')">
                        1/4 pollo
                        <p v-if="contadorCuartoPollo > 0">
                            <button class="btn" @click="restarItem('cuartoPollo')">-</button>
                            {{contadorCuartoPollo}}
                            <button class="btn" @click="agregarItem('cuartoPollo')">+</button>
                        </p>
                    </div>
                </div>
                <div class="col-4 mb-2">
                    <div class="h-100 w-100 btn btn-primary" @click.self="agregarItem('refresco')">
                        Refresco
                        <p v-if="contadorRefresco > 0">
                            <button class="btn" @click="restarItem('refresco')">-</button>
                            {{contadorRefresco}}
                            <button class="btn" @click="agregarItem('refresco')">+</button>
                        </p>
                    </div>
                </div>
                <div class="col-4 mb-2">
                    <div class="h-100 w-100 btn btn-primary" @click.self="agregarItem('complemento')">
                        Complemento
                        <p v-if="contadorComplemento > 0">
                            <button class="btn" @click="restarItem('complemento')">-</button>
                            {{contadorComplemento}}
                            <button class="btn" @click="agregarItem('complemento')">+</button>
                        </p>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label for="">Domicilio</label>
                <input type="text" class="form-control">
            </div>
            <div class="mb-4">
                <label for="">hora de entrega</label>
                <input type="time" class="form-control">
            </div>
            <div class="mb-4">
                <label for="">Cliente</label>
                <input type="text" class="form-control">
            </div>
            <button class="btn btn-secondary">Crear</button>
        </div>
    </div>
</div>
<script src="<?= base_url('/js/nuevo_pedido.js')?>"></script>