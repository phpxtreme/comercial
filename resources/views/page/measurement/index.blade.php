@extends('wrapper')
@section('content')
    <div class="row">
        <legend>Unidades de Medida</legend>
        @if(session('info'))
            <div class="col-sm-12">
                <div class="alert alert-success">
                    <i class="fa fa-info-circle"></i>
                    {{ session('info') }}
                </div>
            </div>
        @endif
        @if(session('error'))
            <div class="col-sm-12">
                <div class="alert alert-danger">
                    <i class="fa fa-info-circle"></i>
                    {{ session('error') }}
                </div>
            </div>
        @endif
        <div class="col-sm-12">
            <div class="pb-2 text-right">
                <a href="{{ url("measurement/create") }}" class="btn btn-sm btn-info">
                    <i class="fa fa-plus"></i>
                    Nuevo
                </a>
                <a href="" class="btn btn-sm btn-warning">
                    <i class="fa fa-print"></i>
                    Imprimir
                </a>
            </div>
            <table class="table table-sm table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(sizeof($measurements->all()) > 0)
                    @foreach($measurements->all() as $measurement)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $measurement->name }}</td>
                            <td>{{ $measurement->description }}</td>
                            <td class="text-right">
                                <a href="{{ url("measurement/show/$measurement->id") }}" class="btn btn-sm btn-success" title="Detalles">
                                    <i class="fa fa-search"></i>
                                </a>
                                <a href='{{ url("measurement/update/$measurement->id") }}' class="btn btn-sm btn-primary" title="Modificar">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                </a><a href="{{ url("measurement/remove/$measurement->id") }}" class="btn btn-sm btn-danger" title="Eliminar">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection