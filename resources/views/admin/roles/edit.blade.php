@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Rol {{ $rol->name }}</div>
                <div class="card-body">
                    <form action="{{ route('admin.roles.update', $rol) }}" method="POST">
                        {{--  cross-site request forgery  --}}
                        @csrf
                        {{ method_field('PUT') }}
                        {{--  Field Name --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $rol->name }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Field Active --}}
                        <div class="form-group row">
                            <label for="active" class="col-md-4 col-form-label text-md-right">Activo</label>
                            <div class="col-md-6">
                                <input type="hidden" name="active" value ="0">
                                <input id="active" type="checkbox" class="form-control @error('active') is-invalid @enderror"  name="active" value="1"
                                @if ($rol->active == 1)
                                    checked="checked"
                                @endif
                                >
                                @error('active')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Field Specials --}}
                        <!-- <div class="form-group row">
                            <label for="special" class="col-md-4 col-form-label text-md-right">Permisos Especiales</label>
                            <div class="col-md-3 form-check-inline mx-auto">
                                <input class="form-check-input" type="radio" name="special" id="all-access" value="all-access">
                                <label class="form-check-label" for="all-access">Acceso Total</label>
                            </div>
                            <div class="col-md-3 form-check-inline mx-auto">
                                <input class="form-check-input" type="radio" name="special" id="no-access" value="no-access">
                                <label class="form-check-label" for="no-access">Ningún Acceso</label>
                            </div>
                        </div> -->
                        {{--  Field Permissions --}}
                        <div class="form-group row">
                            <label for="rols" class="col-md-4 col-form-label text-md-right">Permisos</label>
                            <div class="col-md-6">
                                @foreach ($permisos as $permiso)
                                    <div class="form-check">
                                        <input type="checkbox" id="permissions[{{ $permiso->id }}]" name="permissions[{{ $permiso->id }}]" value={{ $permiso->id }}
                                            @if ($rol->permissions->pluck('id')->contains($permiso->id))
                                                checked
                                            @endif
                                        >
                                        <label for="permissions[{{ $permiso->id }}]">{{ $permiso->name }}<label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
