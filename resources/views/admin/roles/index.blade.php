@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="d-flex">
                <a class="btn btn-primary" href="{{ route('admin.roles.create') }}"> Nuevo Rol</a>
            </div>
            <div class="card">
                <div class="card-header">Roles</div>
                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Activo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <th scope="row">{{ $role->id }} </th>
                                    <td> {{ $role->name }}</td>
                                    <td>
                                          @if ($role->active == 1)
                                                {{ __("SI")}}
                                            @else
                                                {{ __("NO")}}
                                            @endif
                                    </td>
                                    <td>
                                        @can('manage-roles')
                                            <a href="{{ route('admin.roles.edit', $role->id ) }}"><button type="button" class="btn btn-success float-left">Editar</button></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
