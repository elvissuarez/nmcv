@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex">
                <a class="btn btn-primary" href="{{ route('admin.sucursales.create') }}"> Nueva Sucursal</a>
            </div>
            <div class="card">
                <div class="card-header text-body">Sucursales</div>
                <div class="card-body">
                    @if (count($sucursales))
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">IP</th>
                                    <th scope="col">Proveedor</th>
                                    <th scope="col">Activo</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sucursales as $sucursal)
                                    <tr>
                                        <th scope="row">{{ $sucursal->ocode }} </th>
                                        <td> {{ $sucursal->oname }}</td>
                                        <td>{{ $sucursal->oip }} </td>
                                        <td>{{ implode(', ', $sucursal->Providers()->get()->pluck('pname')->toArray()) }} </td>
                                         <td>
                                            @if ($sucursal->oactive == 1)
                                                {{ __("SI")}}
                                            @else
                                                {{ __("NO")}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.sucursales.edit', $sucursal->ocode ) }}"><button type="button" class="btn btn-success float-left">Editar</button></a>
                                            <form action="{{ route('admin.sucursales.destroy', $sucursal) }}" method="POST" class="float-left">
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
