@extends('wrapper')
@section('content')
    <div class="row">
        <legend>Items</legend>
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
                <a href="" class="btn btn-sm btn-info">
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
                        <form action="" class="row" method="POST">
                            @csrf
                            <div class="col-12 col-sm">
                                <label for="provider">
                                    <strong>Proveedor</strong>
                                </label>
                                <select name="provider-groups" id="provider-groups" class="form-control chosen-select">
                                    @if(sizeof($providers->all())>0)
                                        @foreach($providers->all() as $provider)
                                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-12 col-sm">
                                <label for="group">
                                    <strong>Grupo</strong>
                                </label>
                                <select name="group-items" id="group-items" class="form-control chosen-select">
                                    <option></option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-auto pl-sm-0">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-search"></i>
                                </button>
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
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th>Modelo</th>
                    <th>Precio</th>
                    <th>Moneda</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript" src="{{ asset('js/items.js') }}"></script>
@endsection
