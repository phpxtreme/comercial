@extends('wrapper')
@section('content')
    <div class="row">
        <legend>Agregar Factura</legend>
        <div class="col-sm-12">
            <form action="{{ url('bill') }}" class="form-horizontal" method="POST">
                @csrf
                <div class="form-group">
                    <div class="col-lg-12">
                        @if(sizeof($errors) > 0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <i class="fa fa-remove"></i>
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="date">
                            <strong>Fecha</strong>
                        </label>
                        <input type="date" name="date" class="form-control" id="date" autofocus>
                    </div>
                    <div class="col-md-4">
                        <label for="provider">
                            <strong>Proveedor</strong>
                        </label>
                        <select class="form-control" name="provider" id="provider">
                            <option></option>
                            @if(sizeof($providers->all()) > 0)
                                @foreach($providers->all() as $provider)
                                    <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="identifier">
                            <strong>Identificador</strong>
                        </label>
                        <input type="text" name="identifier" class="form-control" id="identifier">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="shipping">
                            <strong>Tipo de Envío</strong>
                        </label>
                        <select class="form-control" name="shipping" id="shipping">
                            <option></option>
                            @if(sizeof($shippings->all()) > 0)
                                @foreach($shippings->all() as $shipping)
                                    <option value="{{ $shipping->id }}">{{ $shipping->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="price">
                            <strong>Precio</strong>
                        </label>
                        <input type="number" name="price" class="form-control" id="price" step=".01" min="0">
                    </div>
                    <div class="col-md-4">
                        <label for="currency">
                            <strong>Moneda</strong>
                        </label>
                        <select class="form-control" name="currency" id="currency">
                            <option></option>
                            @if(sizeof($currencies->all()) > 0)
                                @foreach($currencies->all() as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="currency">
                            <strong>Observaciones</strong>
                        </label>
                        <textarea class="form-control" name="observations" id="observations" rows="5" style="resize: none">

                        </textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group pt-3">
                    <div class="col-lg-12 col-lg-offset-2 text-right">
                        <button type="submit" class="btn btn-success">
                            Guardar
                        </button>
                        <a href="{{ url('bill') }}" class="btn btn-info">Regresar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection