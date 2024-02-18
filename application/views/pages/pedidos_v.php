<div class="container-fluid bg-naranja" id="pedidosListadoSection">
    <div class="d-flex flex-column align-items-center" >
        <h1 class="text-center mt-5 mb-3 text-light w-100">Pedidos</h1>
        <div class="d-flex justify-content-between w-100 mb-2">
            <div class="d-flex justify-content-center align-items-center bg-white rounded ps-2">
                <label class="fw-bold me-2" for="estPedidoModal">Día: </label>
                <input type="date" class="form-control" v-model="diaFiltro" @change="obtenerPedidos()">
            </div>
            <button class="btn btn-light w-auto fw-bold" @click="nuevoPedido()">Nuevo pedido</button>
        </div>
        <div class="bg-white form-contenedor px-3 py-4 rounded-3 shadow w-100 mb-3">
            <div class="d-flex align-items-center justify-content-center mb-4">
                <label class="fw-bold me-2" for="estPedidoModal">Filtrar por estado: </label>
                <select class="form-control w-auto" id="estPedidoModal" v-model="filtroEstado">
                    <option value="todos">Todos</option>
                    <option value="preparando">Preparando</option>
                    <option value="en_camino">En camino</option>
                    <option value="entregado">Entregado</option>
                    <option value="eliminado">Eliminados</option>
                </select>
            </div>
            <div class="table-responsive">
                <table class="table listado">
                    <thead >
                        <th colspan="2">Datos del pedido</th>
                        <th class="text-center">Solicitado</th>
                        <th class="text-center">Entrega</th>
                        <th class="text-center">Acción</th>
                    </thead>
                    <tbody>
                        <tr v-for="item in pedidosFiltrados" :class="'est-' + item.estado">
                            <td style="min-width: 180px">
                                <p class="mb-1" v-if="item.nombre_persona.length > 0" style="font-size:20px"><b> {{item.nombre_persona}} </b></p>
                                <p class="mb-1" v-if="item.domicilio.length > 0" style="font-size:14px"><b>Domicilio:</b> {{item.domicilio}} </p>
                                <p class="mb-0" v-if="item.total.length > 0" style="font-size:16px"><b> $ {{item.total}} </b></p>
                            </td>
                            <td style="min-width: 180px">
                                <p class="mb-1 text-wrap-balance" v-if="item.paquetes.length > 0" style="font-size:15px"><b> {{item.paquetes}} </b></p>
                                <p class="mb-0 text-wrap-balance" v-if="item.productos.length > 0" style="font-size:14px"><b>Extra:</b> {{item.productos}}</p>
                            </td>
                            <td class="text-center fw-bold" style="min-width: 90px">{{formatoHora(item.hora_creacion)}}</td>
                            <td class="text-center fw-bold" style="min-width: 90px">{{formatoHora(item.hora_entrega)}}</td>
                            <td class="text-center">
                                <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#myModal" @click="seleccionarPedido(item)">Estado</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#myModalDelete" v-if="item.estado != 'eliminado'" @click="seleccionarPedido(item)">Elminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 

    <!-- Modal Estado -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="myModalLabel">Pedido para {{pedidoSelec.nombre_persona}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="estPedidoModal">Estado del pedido</label>
                <select class="form-control mt-2 mb-4" id="estPedidoModal" v-model="estadoPedidoModal" @change="cambiarEstado()">
                    <option value="preparando">Preparando</option>
                    <option value="en_camino">En camino</option>
                    <option value="entregado">Entregado</option>
                    <option value="eliminado" v-if="pedidoSelec.estado == 'eliminado'">Eliminado</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal Eliminar-->
    <div class="modal fade" id="myModalDelete" tabindex="-1" aria-labelledby="myModalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="myModalDeleteLabel">Confirmar eliminacion</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table align-middle">
                    <tbody>
                        <tr>
                            <td class="fw-bold" style="width: 100px;">Cliente</td>
                            <td class="text-left">{{pedidoSelec.nombre_persona}}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold" style="width: 100px;">Hora de entrega</td>
                            <td class="text-left">{{formatoHora(pedidoSelec.hora_entrega)}}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold" style="width: 100px;">Total</td>
                            <td class="text-left">$ {{pedidoSelec.total}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" @click="eliminarPedido()">Confirmar</button>
            </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('/js/pedidos_listado.js')?>"></script>