@extends('plantillas.adminApp')
@section('main')
<div class="container shadow p-3 mb-2 bg-white rounded mt-2">
    <div class="row justify-content-md-center mb-1 mt-2">
        <div class="col-9">
            @if(session('regionAlert'))
            <div class="alert alert-success alert-dismissible fade show justify-content-md-center text-center" role="alert">
                <h5><strong>{{session('regionAlert')}}</strong></h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>

    <div class="row justify-content-md-center mb-4 mt-2">
    @if(session('failures'))
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg">Informacion procesada, sin embargo se detectaron errores, clic para ver reporte</button>
    @include('modals.failuresImports')
    @endif
    </div>

    <div class="row justify-content-md-center mb-5 mt-3">
        <div class="col-7">
            <div class="card shadow-lg p-3 mb-2 bg-white rounded border border-primary">
                <center>
                    <h4 class="card-header">Regiones</h4>
                    <div class="card-body">
                        <h5 class="card-title">Registrar regiones</h5>
                        <p class="card-text">Se actualizaran o agregaran nuevas regiones sin afectar a los ya existentes,
                            los nombres de las columnas deben de ser, cve_reg, nom_reg, region
                        </p>
                        <div class="col">
                            <form action="{{route('importRegion')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @error('region')
                                <div class="alert alert-danger">
                                    Porfavor seleccione un archivo excel de regiones
                                </div>
                                @enderror
                                <div class="form-control-file">
                                    <input type="file" name="region" id="region" class="btn btn-primary">
                                </div>
                                <br>
                                <div class="form-control-button">
                                    <button type="submit" class="btn btn-success">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>
</div>
@endsection