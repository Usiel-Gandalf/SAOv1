@extends('plantillas.adminApp')
@section('main')
<div class="row justify-content-md-center">
    <div class="col-6 shadow p-3 mb-5 bg-white rounded mt-4">
        <div class="col border border-secondary">
            <div class="row justify-content-center mt-1">
                <h2 class="">Registrar localidad</h2>
            </div>
            <form action="{{url('/locality')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row form-group">
                    <div class="col">
                        <label for="id">{{'Clave de la localidad'}}</label>
                        <input type="number" class="form-control" name="id" id="id" value="{{old('id')}}">
                    </div>
                    @error('id')
                    <div class="alert alert-danger">
                        Error en la clave, comprobar nuevamente(clave valida, numerico, no vacio).
                    </div>
                    @enderror

                    <div class="col">
                        <label for="keyLocality">{{'Numero de la localidad'}}</label>
                        <input type="number" class="form-control" name="keyLocality" id="keyLocality" value="{{old('keyLocality')}}">
                    </div>
                    @error('keyLocality')
                    <div class="alert alert-danger">
                        Error en la clave de la localidad, revisar nuevamente(numerico, no vacio).
                    </div>
                    @enderror
                </div>

                <div class="row form-group">
                <div class="col">
                    <label for="nameLocality">{{'Nombre de la localidad'}}</label>
                    <input type="text" class="form-control" name="nameLocality" id="nameLocality" value="{{old('nameLocality')}}">
                </div>
                @error('nameLocality')
                <div class="alert alert-danger">
                    Error en el nombre de la localidad, revisar nuevamente, (nombre valido, no vacio, no numerico)
                </div>
                @enderror

                <div class="col">
                    <label for="idMunicipality">{{'Municipio: '}}</label>
                    <select id="idMunicipality" name="idMunicipality" class="form-control">
                        <option selected>Selecciona el municipio perteneciente</option>
                        @foreach($municipalities as $municipality)
                        <option name="{{$municipality->id}}" value="{{$municipality->id}}">{{$municipality->nameMunicipality}}</option>
                        @endforeach
                    </select>
                </div>
                @error('idMunicipality')
                <div class="alert alert-danger">
                    Seleccione un municipio
                </div>
                @enderror
                </div>

                <div class="row justify-content-center mb-3">
                    <input type="submit" class="btn btn-success mr-1" value="Registrar">
                    <a href="{{url('/locality')}}" class="btn btn-primary">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection