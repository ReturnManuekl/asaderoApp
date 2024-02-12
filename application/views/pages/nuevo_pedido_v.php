<div class="container-fluid bg-naranja" id="nuevoPedidoSection">
    <div class="d-flex flex-column align-items-center vh-100" >
        <h1 class="text-center mt-5 mb-3 text-light w-100">Nuevo Pedido</h1>
        <div class="d-flex justify-content-start w-100 mb-2">
            <button class="btn btn-light w-auto fw-bold" @click="regresar()">Regresar</button>
        </div>
        <div class="bg-white form-contenedor px-3 py-4 rounded-3 shadow w-100">
            <label for="">Paquetes</label>
            <input type="text">
            <div class="row my-2">
                <div class="col-4 border">Paquete 1</div>
                <div class="col-4 border">Paquete 2</div>
                <div class="col-4 border">Paquete 3</div>
            </div>
            <label for="">Productos Extra</label>
            <input type="text">
        </div>
    </div>
</div>
<script src="<?= base_url('/js/nuevo_pedido.js')?>"></script>