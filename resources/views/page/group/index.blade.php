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
            @if(sizeof($providers->all()) > 0)
                @foreach($providers->all() as $provider)
                    <div class="card rounded-0 mb-3">
                        <div class="card-header"><strong>{{ $provider->name }}</strong></div>
                        <table class="table table-sm table-striped table-hover">
                            <thead></thead>
                            <tbody>
                            @if(sizeof($provider->groups) > 0)
                                @foreach($provider->groups as $group)
                                    <tr>
                                        <td>{{ $group->name }}</td>
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
                            @else
                                <tr>
                                    <td colspan="3" class="text-center">
                                        <span class="text-danger"><strong>VACIO</strong></span>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <hr class="bg-dark">
                @endforeach
            @endif
        </div>
    </div>
@endsection