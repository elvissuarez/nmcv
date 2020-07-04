@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.proveedores.create') }}"> Nuevo Proveedor</a>
            </div>
            <div class="card">
                <div class="card-header text-body">Proveedores</div>
                <div class="card-body">
                    @if (count($proveedores))
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __("#")}}</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Contacto</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Contrato</th>
                                    <th scope="col">Activo</th>
                                    <th scope="col">Creado</th>
                                    <th scope="col">Modificado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proveedores as $i=>$proveedor)
                                    <tr>
                                        <th scope="row">{{ $i+1 }}</th>
                                        <td> {{ $proveedor->pname }}</td>
                                        <td> {{ $proveedor->pcontact }}</td>
                                        <td>{{ $proveedor->pemail }} </td>
                                        <td>{{ $proveedor->pphone }} </td>
                                        <td> {{ $proveedor->pcontract }}</td>
                                        <td>
                                            @if ($proveedor->pactive == 1)
                                                {{ __("SI")}}
                                            @else
                                                {{ __("NO")}}
                                            @endif
                                        </td>
                                        <td>{{ $proveedor->created_at }} </td>
                                        <td>{{ $proveedor->updated_at }} </td>
                                        <td>
                                            <a href="{{ route('admin.proveedores.edit', $proveedor->id ) }}"><button type="button" class="btn btn-success float-left">Editar</button></a>
                                            <form action="{{ route('admin.proveedores.destroy', $proveedor)}}" method="POST" class="float-left">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-secondary">Eliminar</button></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-body">Sin Información</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
