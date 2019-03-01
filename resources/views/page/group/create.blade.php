@extends('wrapper')
@section('content')
    <div class="row">
        <legend>Agregar Grupo</legend>
        <div class="col-sm-12">
            <form action="" class="form-horizontal" method="POST">
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
                    <label for="name" class="col-lg-12">
                        Nombre
                    </label>
                    <div class="col-lg-12">
                        <input type="text" name="name" class="form-control" id="name" autofocus>
                    </div>
                    <label for="provider" class="col-lg-12">
                        Proveedor
                    </label>
                    <div class="col-lg-12">
                        <select class="form-control" name="provider" id="provider">
                            @if(sizeof($providers->all()) > 0)
                                @foreach($providers->all() as $provider)
                                    <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <label for="price" class="col-lg-12">
                        Precio
                    </label>
                    <div class="col-lg-12">
                        <input type="number" name="price" class="form-control" id="price" min="0">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12 col-lg-offset-2 text-right">
                        <button type="submit" class="btn btn-success">
                            Guardar
                        </button>
                        <a href="{{ url('group') }}" class="btn btn-info">Regresar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection