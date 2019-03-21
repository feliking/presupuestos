@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        CERTIFICACION PRESUPUESTARIA
        @{{ $data }}
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Fecha:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="date" class="form-control" v-model="fecha">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Saldo:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" step="0.01" v-model="saldo">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Literal:</label>
                    </div>
                    <div class="col-md-8">
                        <textarea class="form-control" name="" id="" rows="3" disabled v-model="convert"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Gestión:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" v-model="gestion">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Secuencia:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" v-model="secuencia">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for=""></label>
                    </div>
                    <div class="col-md-8 pt-3">
                        <button class="btn btn-info btn-block" @click.prevent="reservation()">Reservar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div v-if="reserve" class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">Entidad:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" disabled v-model="das.entidad">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled v-model="das.desc_entidad">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">D.A. :</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" disabled v-model="das.da">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled v-model="das.desc_da">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">U.E. :</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" v-model="ue" @keyup="findUE()">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled v-model="desc_ue">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">Tipo Gasto:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" v-model="gast" @keyup="findGast()">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled v-model="tipo_gasto">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">Prog.:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" v-model="prog">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">Act.:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control" v-model="act">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">SISIN:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row form-group">
                    <label for="">Observaciones:</label>
                </div>
                <div class="row form-group">
                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Proy.:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" v-model="proy" @keyup="findDetail()">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Detalle:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" disabled v-model="nombre">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Activo:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" disabled v-model="cod">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <button class="btn btn-warning btn-block">Modificar</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-success btn-block" @click.prevent="addCertificate(certificado)">Nuevo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div v-if="reserve" class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Entidad</th>
                    <th>D.A.</th>
                    <th>U.E.</th>
                    <th>Tipo Gasto</th>
                    <th>Prog</th>
                    <th>Proy</th>
                    <th>Act.</th>
                    <th>Sisin</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Entidad</th>
                    <th>D.A.</th>
                    <th>U.E.</th>
                    <th>Tipo Gasto</th>
                    <th>Prog</th>
                    <th>Proy</th>
                    <th>Act.</th>
                    <th>Sisin</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                <tr v-for="certificate in certificados">
                    <td></td>
                    <td>@{{ certificate.entidad }}</td>
                    <td>@{{ certificate.da }}</td>
                    <td>@{{ certificate.ue }}</td>
                    <td>@{{ certificate.tipo_gasto }}</td>
                    <td>@{{ certificate.prog }}</td>
                    <td>@{{ certificate.proy }}</td>
                    <td>@{{ certificate.act }}</td>
                    <td>@{{ certificate.sisin }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
const app = new Vue({
    el: '#app',
    data(){
        return{
            reserve: true,
            certificado: {},
            certificados: [],
            convert: '',
            gestion: '',
            fecha: '',
            saldo: '',
            secuencia: '',
            das: {},
            ue: '',
            desc_ue: '',
            gast: '',
            tipo_gasto: '',
            proy: '',
            prog: '',
            act: '',
            nombre: '',
            cod: ''
        }
    },
    methods:{
        reservation(){
            this.reserve = true;
            var convert = numeroALetras(this.saldo, {
                plural: "Bolivianos",
                singular: "Boliviano",
                centPlural: "Centavos",
                centSingular: "Centavo"
            });
            this.convert = this.first(convert);
        },
        first(string){
            return string.charAt(0).toUpperCase() + string.slice(1);
        },
        addCertificate(certificate){
            this.certificados.push(certificate);
            this.certificado = {};
        },
        findUE(){
            if(this.ue != ''){
                axios.get('/find/findue/'+this.ue).then(response => {
                    this.desc_ue = response.data;
                });
            }
        },
        findGast(){
            if(this.gast != ''){
                axios.get('/find/findgast/'+this.gast).then(response => {
                    this.tipo_gasto = response.data;
                });
            }
        },
        findDetail(){
            if(this.das.da && this.ue && this.prog && this.act && this.proy){
                axios.get('/findnombre/'+this.das.da+'/'+this.ue+'/'+this.prog+'/'+this.act+'/'+this.proy).then(response => {
                    this.nombre = response.data;
                })
            }
        }
    },
    mounted() {
        var today = new Date();
        var dd = today.getDate();
        if(dd < 10){
            dd = '0'+dd;
        }
        var mm = today.getMonth()+1;
        if(mm < 10){
            mm = '0'+mm;
        }
        var yyyy = today.getFullYear();
        this.gestion = yyyy;
        this.fecha = yyyy+'-'+mm+'-'+dd;
        axios.get('/certificado/models').then(response =>{
            this.das = response.data[0];
            this.cod = response.data[1] + 1;

        });

    },
    
})
</script>
@endsection