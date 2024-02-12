<div class="container-fluid bg-naranja" id="loginSection">
    <div class="d-flex flex-column align-items-center vh-100" >
        <h1 class="text-center my-5 text-light w-100">Pollos</br>El asadero</h1>
        <div class="bg-white form-contenedor px-3 py-4 rounded-3 shadow w-100">
            <div class="alert alert-warning" role="alert" v-if="showMsgError">
                Usuario incorrecto
            </div>
            <p class="texto mb-1">Usuario:</p>
            <input type="text" class="form-control rounded-1 mb-3 bg-gris border-0 w-100" v-model="usuario">
            <p class="texto mb-1">Contraseña:</p>
            <input type="password" class="form-control rounded-1 mb-4 bg-gris border-0 w-100" v-model="clave">
            <div class="d-flex justify-content-center pt-3">
                <button type="submit" class="btn btn-main" @click="verificarUsuario()">Entrar</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('/js/login.js')?>"></script>