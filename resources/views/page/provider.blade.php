@extends('wrapper')
@section('content')
    <div class="row">
        <legend>Proveedores</legend>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>TOMSA DESTIL</td>
                <td class="text-right">
                    <a href="" class="btn btn-sm btn-success">
                        <i class="fa fa-search"></i>
                    </a>
                    <a href="" class="btn btn-sm btn-primary">
                        <i class="fa fa-pencil"></i>
                    </a>
                    </a><a href="" class="btn btn-sm btn-danger">
                        <i class="fa fa-remove"></i>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection