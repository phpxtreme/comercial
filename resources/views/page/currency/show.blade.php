@extends('wrapper')
@section('content')
    <div class="row">
        @if(isset($currency))
            <legend>{{ $currency->description }}</legend>
            <div class="col-sm-12">
                <table class="table table-sm table-striped table-hover">
                    <tbody>
                    <tr>
                        <td><strong>Nombre</strong></td>
                        <td>
                            {{ $currency->name }}
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Descripción</strong></td>
                        <td>
                            {{ $currency->description }}
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
                <a href="{{ url('currency') }}" class="btn btn-info">Regresar</a>
            </div>
        </div>
    </div>
@endsection