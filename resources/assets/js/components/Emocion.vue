<template>
    <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> emocion
                        <button type="button" @click="abrirModal('emocion','registrar')" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" id="opcion" name="opcion">
                                      <option value="nombre">Nombre</option>
                                    </select>
                                    <input type="text" id="texto" name="texto" class="form-control" placeholder="Coloque su Busqueda">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Nombre Emocion</th>
                                    <!--<th>Estado</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="emocion in arrayEmocion" :key="emocion.idEmocion">
                                    <td>
                                        <button type="button" @click="abrirModal('emocion','actualizar',emocion)" class="btn btn-warning btn-sm">
                                          <i class="icon-pencil"></i>
                                        </button> &nbsp;
                                        
                                            <button type="button" class="btn btn-danger btn-sm" @click="eliminarEmocion(emocion.Emocion_id)">
                                                <i class="icon-trash"></i>
                                            </button>
                                        
                                    </td>
                                    <td v-text="emocion.Emo_Nombre"></td>
                                    <!--<td>
                                        <span class="badge badge-success">Activo</span>
                                    </td>-->
                                </tr>
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#">Ant</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">4</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                              <span aria-hidden="true">X</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="Emo_Nombre" class="form-control" placeholder="Nombre de la emocion">
                                    </div>
                                </div>
                                <div v-show="errorEmocion" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjEmocion" :key="error" v-text="error">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarEmocion()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarEmocion()">Actualizar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
        </main>
</template>

<script>
    export default {
        data (){
            return{
                Emocion_id : 0,
                Emo_Nombre : '',
                arrayEmocion : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorEmocion : 0,
                errorMostrarMsjEmocion : []
            }

        },
        methods : {
            listarEmocion (){
                let me=this;
                axios.get('/emocion').then(function (response) {
                me.arrayEmocion = response.data;
                })
                .catch(function (error) {
                console.log(error);
                    })
                },
            registrarEmocion(){
               if(this.validarEmocion()){
                    return;
                }

                let me = this;
                axios.post('/emocion/registrar',{
                    'Emo_Nombre':this.Emo_Nombre
                }).then(function (response){
                    me.cerrarModal();
                    me.listarEmocion();
                }).catch(function (error) {
                    console.log(error);
                });
            },
            actualizarEmocion(){
                if(this.validarEmocion()){
                    return;
                }

                let me = this;
                axios.put('/emocion/actualizar',{
                    'idEmocion':this.Emocion_id,
                    'Emo_Nombre':this.Emo_Nombre
                    //'hola': console.log(this.Emocion_id)
                }).then(function (response){
                    me.cerrarModal();
                    me.listarEmocion();
                }).catch(function (error) {
                    console.log(error);
                });
            },

            //metodo eliminar emociones
            eliminarEmocion(Emocion_id){
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                title: '¿DESEAS ELIMINAR ESTE CAMPO?',
                text: "UNA VEZ ELIMINADO NO PODRAS RECUPERARLO!!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'SI, BORRALO!',
                cancelButtonText: 'NO, CANCELA!',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {

                    //metodo para eliminar
                    let me = this;
                    axios.delete('/emocion/eliminar',{
                        'idEmocion': Emocion_id, 
                        'hola': console.log(Emocion_id)
                    }).then(function (response){
                        me.listarEmocion();
                        swalWithBootstrapButtons.fire(
                            'ELIMINADO!!',
                            'El campo a sido eliminado exitosamente',
                            'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    }); //termina metodo para eliminar
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                    )
                }
                })
            },
            //termina metodo eliminar emociones

            validarEmocion(){
                this.errorEmocion = 0;
                this.errorMostrarMsjEmocion = [];

                if(!this.Emo_Nombre){
                    this.errorMostrarMsjEmocion.push("Ingrese nombre de la emocion");
                } 

                if(this.errorMostrarMsjEmocion.length) {
                    this.errorEmocion = 1;
                }

                return this.errorEmocion;
            },

            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.Emo_Nombre=''; 
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "emocion":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Emocion';
                                this.Emo_Nombre ='';
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal = 1;
                                this.tituloModal = 'Actualizar Emocion';
                                this.tipoAccion = 2;
                                this.Emocion_id = data['idEmocion'];
                                this.Emo_Nombre = data['Emo_Nombre'];
                                break;
                            }
                        }
                    }
                }
            }
        },
        mounted() {
            this.listarEmocion();
        }
    }
</script>
<style>
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
</style>
