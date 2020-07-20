@extends('plantillas.adminApp')
@section('main')
@if(Auth::user()->rol == 1)
<div class="container shadow p-3 mb-2 bg-white rounded mt-2">
    <div class="container shadow p-3 mb-5 bg-white rounded border border-success">
        <div class="row justify-content-md-center mb-4">
            <h1>JOVENES ESCRIBIENDO EL FUTURO</h1>
        </div>

        <div class="row justify-content-md-center">
            @if(session('saveHiger'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h5><strong>{{session('saveHiger')}}</strong></h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(session('updateHiger'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <h5><strong>{{session('updateHiger')}}</strong></h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(session('deleteHiger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5><strong>{{session('deleteHiger')}}</strong></h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(session('notFound'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{session('notFound')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>

        <div class="container shadow p-3 mb-5 bg-white rounded border border-success">
        <div class="container mt-2">
            <div class="row">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Bimestre</th>
                            <th scope="col">Remesa</th>
                            <th scope="col" style="width:35%; height:5%">Escuela</th>
                            <th scope="col">Becario</th>
                            <th scope="col">Estado</th>
                            <th scope="col" style="width:10%; height:5%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($higers as $higer)
                        <tr>
                            <th scope="row">
                                @if($higer->bimester == 1)
                                {{'Enero-Febrero'}}
                                @elseif($higer->bimester == 2)
                                {{'Marzo-Abril'}}
                                @elseif($higer->bimester == 3)
                                {{'Mayo-Junio'}}
                                @elseif($higer->bimester == 4)
                                {{'Septiembre-Octubre'}}
                                @elseif($higer->bimester == 5)
                                {{'Noviembre-Diciembre'}}
                                @endif
                            </th>
                            <td>{{$higer->consignment}}</td>
                            <td>Desconocido</td>
                            <td>{{$higer->scholar_id}}</td>
                            <td>
                                @if($higer->status == 0)
                                {{'Pendiente'}}
                                @elseif($higer->status == 1)
                                {{'Entregado'}}
                                @elseif($higer->status == 2)
                                {{'No Entregado | No localizado'}}
                                @elseif($higer->status == 3)
                                {{'no entregado por baja'}}
                                @endif
                            </td>
                            <td class="justify-content-center">
                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Acciones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item" href="{{url('/higerEducation/'.$higer->id.'/edit')}}">Editar</a>

                                            <form method="post" action="{{url('/higerEducation/'.$higer->id)}}">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Esta seguro que quiere eliminar la escuela?');">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col">
                {{ $higers->links() }}
            </div>
            <div class="col float-right">
                 <a class="btn btn-success float-right" href="{{url('/higerEducation/create')}}">Crear Regitro</a>
            </div>
        </div>
    </div>   
    </div>

    <div class="container shadow p-3 mb-5 bg-white rounded mt-5 border border-success">
        @include('user.higers.higerCermGeneral')

        <div class="row">
            <div class="col foat-right">
                <a class="btn btn-success float-right" href="{{url('higerPdf')}}" target="_blank">PDF</a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection