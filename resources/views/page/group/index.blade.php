@extends('wrapper')
@section('content')
    <div class="row">
        <legend>Grupos</legend>
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
                <a href="{{ url('group/create') }}" class="btn btn-sm btn-info">
                    <i class="fa fa-plus"></i>
                    Nuevo
                </a>
                <a href="" class="btn btn-sm btn-warning">
                    <i class="fa fa-print"></i>
                    Imprimir
                </a>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="alert alert-info rounded-0">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url("group/provider/groups") }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-11">
                                    <label for="provider">
                                        <strong>Proveedor</strong>
                                    </label>
                                    <select name="provider" id="provider" class="form-control">
                                        <option></option>
                                        <option value="0">Todos</option>
                                        @if(sizeof($providers->all())>0)
                                            @foreach($providers->all() as $provider)
                                                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-1">
                                    <label></label>
                                    <button class="btn btn-success btn-block" title="Buscar">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <table class="table table-sm table-striped table-hover">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Proveedor</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @isset($groups)
                    @if(sizeof($groups->all()) > 0)
                        @foreach($groups->all() as $group)
                            <tr>
                                <td>{{ $group->name }}</td>
                                <td>{{ $group->provider->name }}</td>
                                <td>{{ money_format('%+.2n',$group->price) }}</td>
                                <td class="text-right">
                                    <a href="{{ url("group/show/$group->id") }}" class="btn btn-sm btn-success" title="Detalles">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <a href='{{ url("group/update/$group->id") }}' class="btn btn-sm btn-primary" title="Modificar">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{ url("group/remove/$group->id") }}" class="btn btn-sm btn-danger" title="Eliminar">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endisset
                </tbody>
            </table>
        </div>
    </div>
@endsection