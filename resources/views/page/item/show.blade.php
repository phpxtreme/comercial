@extends('wrapper')
@section('content')
    <div class="row">
        @if(isset($item))
            <legend>{{ $item->description }}</legend>
            <div class="col-sm-12">
                <table class="table table-sm table-striped table-hover">
                    <tbody>
                    <tr>
                        <td><strong>Proveedor</strong></td>
                        <td>
                            {{ $item->group->provider->name }}
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Grupo</strong></td>
                        <td>
                            {{ $item->group->name }}
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Descripción</strong></td>
                        <td>
                            {{ $item->description }}
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Modelo</strong></td>
                        <td>
                            {{ $item->model }}
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Cantidad</strong></td>
                        <td>
                            {{ $item->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Unidad de Medida</strong></td>
                        <td>
                            {{ $item->measurement->name }}
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Prcio</strong></td>
                        <td>
                            {{ money_format('%+.2n',$item->price) }}
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Moneda</strong></td>
                        <td>
                            {{ $item->currency->name }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div class="col-sm-12">
                <div class="alert alert-danger">
                    <i class="fa fa-times-circle"></i>
                    Sin Resultados!
                </div>
            </div>
        @endif
        <div class="col-sm-12">
            <div class="text-right">
                <a href="{{ \Illuminate\Support\Facades\URL::previous() }}" class="btn btn-info">Regresar</a>
            </div>
        </div>
    </div>
@endsection