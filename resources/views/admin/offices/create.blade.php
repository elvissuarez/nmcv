@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb d-flex">
            <div class="pull-left text-light mr-auto p-2">
                <h2>Nueva Sucursal</h2>
            </div>
            <div class="pull-right p-2">
                <a class="btn btn-secondary" href="{{ route('admin.sucursales.index') }}">Regresar</a>
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
    <form action="{{ route('admin.sucursales.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col">
            <div class="form-group row">
                <label for="ocode" class="col-sm-4 col-form-label  text-white">Código Sucursal</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="ocode" name="ocode" placeholder="Código Sucursal">
                </div>
            </div>
           <div class="form-group row">
                <label for="oname" class="col-sm-4 col-form-label  text-white">Nombre Sucursal</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="oname" name="oname" placeholder="Nombre Sucursal">
                </div>
            </div>
             <div class="form-group row">
                <label for="ochannel" class="col-sm-4 col-form-label  text-white">Canal</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="ochannel" name="ochannel" placeholder="Canal">
                </div>
            </div>
            <div class="form-group row">
                <label for="oip" class="col-sm-4 col-form-label  text-white">Direccionamiento IP</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="oip" name="oip" placeholder="Direccionamiento IP">
                </div>
            </div>
            {{-- List Provider--}}
            <div class="form-group row">
                <div for="providers" class="col-sm-4 col-form-label text-white">Proveedor</div>
                <div class="col-sm-8">
                    @foreach ($proveedores as $proveedor)
                        <div class="form-check form-check-inline h-100 justify-content-center align-items-center">
                            <input type="hidden" name="providers[{{ $proveedor->id }}]" value="0">
                            <label for="provider_{{ $proveedor->id }}" class="text-lg text-white">
                                <input id="provider_{{ $proveedor->id }}" type="checkbox" name="providers[{{ $proveedor->id }}]" value="{{ $proveedor->id }}" class="form-check-input">
                            {{ $proveedor->pname }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                <label for="ocity" class="col-sm-4 col-form-label  text-white">Ciudad</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="ocity" name="ocity" placeholder="Ciudad">
                </div>
            </div>
            <div class="form-group row">
                <label for="ostate" class="col-sm-4 col-form-label  text-white">Departamento</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="ostate" name="ostate" placeholder="Departamento">
                </div>
            </div>
            <div class="form-group row">
                <label for="oaddress" class="col-sm-4 col-form-label  text-white">Dirección Sucursal</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="oaddress" name="oaddress" placeholder="Dirección Sucursal">
                </div>
            </div>
            <div class="form-group row">
                <label for="oopening" class="col-sm-4 col-form-label  text-white">Horario Atención</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="oopening" name="oopening" placeholder="Horario Atención">
                </div>
            </div>
            <div class="form-group row">
                <label for="ocontact" class="col-sm-4 col-form-label  text-white">Nombre Contact Sucursal</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="ocontact" name="ocontact" placeholder="Admin Sucursal">
                </div>
            </div>
            <div class="form-group row">
                <label for="ophone" class="col-sm-4 col-form-label  text-white">Teléfono Contacto</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="ophone" name="ophone" placeholder="Teléfono">
                </div>
            </div>
            <div class="form-group row">
                <label for="oemail" class="col-sm-4 col-form-label  text-white">Email Contacto</label>
                <div class="col-sm-8">
                <input type="email" class="form-control" id="oemail" name="oemail" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="olatitude" class="col-sm-4 col-form-label  text-white">Latitud</label>
                <div class="col-sm-8">
                <input type="number" class="form-control" id="olatitude" name="olatitude" placeholder="latitud">
                </div>
            </div>
            <div class="form-group row">
                <label for="olongitude" class="col-sm-4 col-form-label  text-white">Longitud</label>
                <div class="col-sm-8">
                <input type="number" class="form-control" id="olongitude" name="olongitude" placeholder="longitud">
                </div>
            </div>
            {{--  Field Active --}}
            <div class="form-group row">
                <label for="oactive" class="col-sm-4 col-form-label text-white">Activo</label>
                <div class="col-sm-8">
                    <input type="hidden" name="oactive" value ="0">
                    <input id="oactive" type="checkbox" class="form-control @error('oactive') is-invalid @enderror"  name="oactive" value="1" checked="checked">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-success btn-lg">Crear Sucursal</button>
        </div>
    </form>
</div>
@endsection
