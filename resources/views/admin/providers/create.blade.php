@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb d-flex">
            <div class="pull-left text-light mr-auto p-2">
                <h2>Nuevo Proveedor</h2>
            </div>
            <div class="pull-right p-2">
                <a class="btn btn-secondary" href="{{ route('admin.proveedores.index') }}">Regresar</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.proveedores.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col">
            <div class="form-group row">
                <label for="pname" class="col-sm-4 col-form-label text-white">Nombre Proveedor</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="pname" name="pname" placeholder="Nombre Proveedor">
                </div>
            </div>
            <div class="form-group row">
                <label for="pcontact" class="col-sm-4 col-form-label text-white">Nombre Contacto Proveedor</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="pcontact" name="pcontact" placeholder="Nombre Contacto Proveedor">
                </div>
            </div>
            <div class="form-group row">
                <label for="pphone" class="col-sm-4 col-form-label text-white">Teléfono Proveedor</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="pphone" name="pphone" placeholder="Teléfono Proveedor">
                </div>
            </div>
            <div class="form-group row">
                <label for="pemail" class="col-sm-4 col-form-label text-white">Email Proveedor</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="pemail" name="pemail" placeholder="Email Proveedor">
                </div>
            </div>
            <div class="form-group row">
                <label for="pcontract" class="col-sm-4 col-form-label text-white">Contrato Proveedor</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="pcontract" name="pcontract" placeholder="Contrato Proveedor">
                </div>
            </div>
            {{--  Field Active --}}
            <div class="form-group row">
                <label for="pactive" class="col-sm-4 col-form-label text-white">Activo</label>
                <div class="col-sm-8">
                    <input type="hidden" name="pactive" value ="0">
                    <input id="pactive" type="checkbox" class="form-control @error('pactive') is-invalid @enderror"  name="pactive" value="1" checked="checked">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-success btn-lg">{{__('Guardar')}}</button>
        </div>
    </form>
</div>
@endsection
