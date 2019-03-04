@extends('wrapper')
@section('content')
    <div class="row">
        <legend>Buscar Items por Proveedor</legend>
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
                        <form action="{{ url('search-item-provider/search') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-11">
                                    <label for="provider">
                                        <strong>Proveedor</strong>
                                    </label>
                                    <select name="provider" id="provider" class="form-control">
                                        <option></option>
                                        @if(sizeof($providers->all())>0)
                                            @foreach($providers->all() as $provider)
                                                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-1">
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
            @if(session()->has('items'))
                @if(sizeof(Session::get('items')->all()) > 0)
                    <table class="table table-sm table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Descripción</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-center">Unidad</th>
                            <th class="text-center">Modelo</th>
                            <th>P. Unitario</th>
                            <th>Precio</th>
                            <th class="text-center">Moneda</th>
                            <th class="col-1"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(Session::get('items')->all() as $item)
                            <tr>
                                <td>
                                    {{ $item->description }}
                                </td>
                                <td class="col-1 text-center">
                                    {{ $item->quantity }}
                                </td>
                                <td class="col-1 text-center">
                                    {{ $item->measurement->name }}
                                </td>
                                <td class="col-1 text-center">
                                    {{ $item->model }}
                                </td>
                                <td class="col-1">
                                    {{ money_format('%+.2n',$item->unit_price) }}
                                </td>
                                <td class="col-1">
                                    {{ money_format('%+.2n',$item->price) }}
                                </td>
                                <td class="col-1 text-center">
                                    {{ $item->currency->name }}
                                </td>
                                <td class="text-center">
                                    <a href='{{ url("item/show/$item->id") }}' class="btn btn-sm btn-success" title="Detalles">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            @endif
        </div>
    </div>
@endsection
@section('javascript')@endsection
