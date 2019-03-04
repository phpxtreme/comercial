@extends('wrapper')
@section('content')
    <div class="row">
        <legend>Agregar Item</legend>
        <div class="col-sm-12">
            <form action="{{ url('item/insert') }}" class="form-horizontal" method="POST">
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
                    <div class="col-md-3">
                        <label for="provider" class="col-lg-12">
                            <strong>Proveedor</strong>
                        </label>
                        <div class="col-lg-12">
                            <select class="form-control" name="provider" id="provider">
                                <option></option>
                                @if(sizeof($providers->all()) > 0)
                                    @foreach($providers->all() as $provider)
                                        <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <label for="group" class="col-lg-12">
                            <strong>Grupo</strong>
                        </label>
                        <div class="col-lg-12">
                            <select class="form-control" name="group" id="group">
                                <option></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-9">
                        <label for="description" class="col-lg-12">
                            <strong>Descripción</strong>
                        </label>
                        <div class="col-lg-12">
                            <input type="text" name="description" class="form-control" id="description" autofocus>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="model" class="col-lg-12">
                            <strong>Modelo</strong>
                        </label>
                        <div class="col-lg-12">
                            <input type="text" name="model" class="form-control" id="model">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <label for="quantity" class="col-lg-12">
                            <strong>Cantidad</strong>
                        </label>
                        <div class="col-lg-12">
                            <input type="number" name="quantity" class="form-control" id="quantity" min="0">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="provider" class="col-lg-12">
                            <strong>Unidad de Medida</strong>
                        </label>
                        <div class="col-lg-12">
                            <select class="form-control" name="measurement" id="measurement">
                                @if(sizeof($measurements->all()) > 0)
                                    @foreach($measurements->all() as $measurement)
                                        <option value="{{ $measurement->id }}">{{ $measurement->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="price" class="col-lg-12">
                            <strong>Precio Unitario</strong>
                        </label>
                        <div class="col-lg-12">
                            <input type="number" name="unit_price" class="form-control" id="unit_price" min="0" step=".01">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="price" class="col-lg-12">
                            <strong>Precio</strong>
                        </label>
                        <div class="col-lg-12">
                            <input type="number" name="price" class="form-control" id="price" min="0" step=".01">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="currency" class="col-lg-12">
                            <strong>Moneda</strong>
                        </label>
                        <div class="col-lg-12">
                            <select class="form-control" name="currency" id="currency">
                                @if(sizeof($currencies->all()) > 0)
                                    @foreach($currencies->all() as $currency)
                                        <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group pt-3">
                    <div class="col-lg-12 col-lg-offset-2 text-right">
                        <button type="submit" class="btn btn-success">
                            Guardar
                        </button>
                        <a href="{{ url('item') }}" class="btn btn-info">Regresar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function () {

            $('#provider').change(function () {
                $.get('provider/groups/' + $(this).val(), function (data) {

                    $('#group').empty().append("<option></option>").trigger("chosen:updated");

                    $.each(data, function (index, item) {
                        $('#group').append("<option value='" + item.id + "'>" + item.name + "</option>").trigger("chosen:updated");
                    })
                });
            });
        });
    </script>
@endsection