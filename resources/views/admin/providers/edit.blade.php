@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Proveedor: <strong>{{ $proveedor->pname }}</strong></div>

                <div class="card-body">
                    <form action="{{ route('admin.proveedores.update', $proveedor->id) }}" method="POST">
                        {{--  cross-site request forgery  --}}
                        @csrf
                        {{ method_field('PUT') }}
                        {{--  Field Active --}}
                        <div class="form-group row">
                            <label for="pactive" class="col-md-4 col-form-label text-md-right">Activo</label>
                            <div class="col-md-6">
                                <input type="hidden" name="pactive" value ="0">
                                <input id="pactive" type="checkbox" class="form-control @error('pactive') is-invalid @enderror"  name="pactive" value="1"
                                @if ($proveedor->pactive == 1)
                                    checked="checked"
                                @endif
                                >
                                @error('pactive')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Field Contact --}}
                        <div class="form-group row">
                            <label for="pcontact" class="col-md-4 col-form-label text-md-right">Nombre Contacto Proveedor</label>
                            <div class="col-md-6">
                                <input id="pcontact" type="text" class="form-control @error('pcontact') is-invalid @enderror" name="pcontact" value="{{ $proveedor->pcontact }}" required>
                                @error('pcontact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Field Phone --}}
                        <div class="form-group row">
                            <label for="pphone" class="col-md-4 col-form-label text-md-right">Teléfono Proveedor</label>
                            <div class="col-md-6">
                                <input id="pphone" type="text" class="form-control @error('pphone') is-invalid @enderror" name="pphone" value="{{ $proveedor->pphone }}" required>
                                @error('pphone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Field Email --}}
                        <div class="form-group row">
                            <label for="pemail" class="col-md-4 col-form-label text-md-right">Email Proveedor</label>
                            <div class="col-md-6">
                                <input id="pemail" type="email" class="form-control @error('pemail') is-invalid @enderror" name="pemail" value="{{ $proveedor->pemail }}" required autocomplete="email">
                                @error('pemail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Field Contract --}}
                        <div class="form-group row">
                            <label for="pcontract" class="col-md-4 col-form-label text-md-right">Contrato Proveedor</label>
                            <div class="col-md-6">
                                <input id="pcontract" type="text" class="form-control @error('pcontract') is-invalid @enderror" name="pcontract" value="{{ $proveedor->pcontract }}" required>
                                @error('pcontract')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Hidden Values --}}
                        <input name="updated_at" type="hidden" value="{{ date('Y-m-d H:i:s') }}">
                        {{--  Submit --}}
                        <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
                        <a href="{{ route('admin.proveedores.index') }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Regresar</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
