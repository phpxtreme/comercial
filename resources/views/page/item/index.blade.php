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
                <a href="{{ url('item/create') }}" class="btn btn-sm btn-info">
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
            @if(sizeof($items->all()) > 0)
                <table class="table table-sm table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Descripción</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Unidad</th>
                        <th class="text-center">Modelo</th>
                        <th>Precio</th>
                        <th class="text-center">Moneda</th>
                        <th class="col-1"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items->all() as $item)
                        <tr>
                            <td>
                                {{ $item->description }}
                            </td>
                            <td class="text-center">
                                {{ $item->quantity }}
                            </td>
                            <td class="text-center">
                                {{ $item->measurement->name }}
                            </td>
                            <td class="text-center">
                                {{ $item->model }}
                            </td>
                            <td>
                                {{ money_format('%+.2n',$item->price) }}
                            </td>
                            <td class="text-center">
                                {{ $item->currency->name }}
                            </td>
                            <td class="text-right col-1">
                                <a href='{{ url("item/show/$item->id") }}' class="btn btn-sm btn-success" title="Detalles">
                                    <i class="fa fa-search"></i>
                                </a>
                                <a href='{{ url("item/update/$item->id") }}' class="btn btn-sm btn-primary" title="Modificar">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href='{{ url("item/remove/$item->id") }}' class="btn btn-sm btn-danger" title="Eliminar">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function () {

            $('#provider').change(function () {
                $.get('item/provider/groups/' + $(this).val(), function (data) {

                    $('#group').empty().append("<option></option>").trigger("chosen:updated");

                    $.each(data, function (index, item) {
                        $('#group').append("<option value='" + item.id + "'>" + item.name + "</option>").trigger("chosen:updated");
                    })
                });
            });
        });
    </script>
@endsection
