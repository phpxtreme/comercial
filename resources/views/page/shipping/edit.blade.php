@extends('wrapper')
@section('content')
    <div class="row">
        <legend>Modificar Tipo de Envío</legend>
        @if(isset($shipping))
            <div class="col-sm-12">
                <form action="{{ url("shipping", [$shipping->id]) }}" class="form-horizontal" method="POST">
                    @csrf
                    {{ method_field('PATCH') }}
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
                        <label for="name" class="col-lg-12">
                            <strong>Nombre</strong>
                        </label>
                        <div class="col-lg-12">
                            <input type="text" name="name" class="form-control" id="name" value="{{ $shipping->name }}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12 col-lg-offset-2 text-right">
                            <button type="submit" class="btn btn-success">
                                Guardar
                            </button>
                            <a href="{{ url('shipping') }}" class="btn btn-info">Regresar</a>
                        </div>
                    </div>
                </form>
            </div>
        @else
            <div class="col-sm-12">
                <div class="alert alert-danger">
                    <i class="fa fa-times-circle"></i>
                    Sin Resultados!
                </div>
                <div class="text-right">
                    <a href="{{ url('shipping') }}" class="btn btn-info">Regresar</a>
                </div>
            </div>
        @endif
    </div>
@endsection