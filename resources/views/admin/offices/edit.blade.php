@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Sucursal: <strong>{{ $sucursal->oname }}</strong></div>

                <div class="card-body">
                    <form action="{{ route('admin.sucursales.update', $sucursal->ocode) }}" method="POST">
                        {{--  cross-site request forgery  --}}
                        @csrf
                        {{ method_field('PUT') }}
                        {{--  Field Active --}}
                        <div class="form-group row">
                            <label for="oactive" class="col-md-4 col-form-label text-md-right">Activo</label>
                            <div class="col-md-6">
                                <input type="hidden" name="oactive" value ="0">
                                <input id="oactive" type="checkbox" class="form-control @error('oactive') is-invalid @enderror"  name="oactive" value="1"
                                @if ($sucursal->oactive == 1)
                                    checked="checked"
                                @endif
                                >
                                @error('oactive')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Field Nombre Sucursal --}}
                        <div class="form-group row">
                            <label for="oname" class="col-md-4 col-form-label text-md-right">Nombre Sucursal</label>
                            <div class="col-md-6">
                                <input id="oname" type="text" class="form-control @error('oname') is-invalid @enderror" name="oname" value="{{ $sucursal->oname }}" required>
                                @error('oname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Field Nombre Canal --}}
                        <div class="form-group row">
                            <label for="ochannel" class="col-md-4 col-form-label text-md-right">Canal</label>
                            <div class="col-md-6">
                                <input id="ochannel" type="text" class="form-control @error('ochannel') is-invalid @enderror" name="ochannel" value="{{ $sucursal->ochannel }}" required>
                                @error('ochannel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Field IP --}}
                        <div class="form-group row">
                            <label for="oip" class="col-md-4 col-form-label text-md-right">IP</label>
                            <div class="col-md-6">
                                <input id="oip" type="text" class="form-control @error('oip') is-invalid @enderror" name="oip" value="{{ $sucursal->oip }}" disabled>
                                @error('oip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- List Provider--}}
                        <div class="form-group row">
                            <div for="providers" class="col-md-4 col-form-label text-md-right">Proveedor</div>
                            <div class="col-md-6">
                                @foreach ($proveedores as $proveedor)
                                    <div class="form-check form-check-inline h-100 justify-content-center align-items-center">
                                        <input type="hidden" name="providers[{{ $proveedor->id }}]" value="0">
                                        <label for="provider_{{ $proveedor->id }}" class="text-lg text-dark">
                                            <input id="provider_{{ $proveedor->id }}" type="checkbox" name="providers[{{ $proveedor->id }}]" value="{{ $proveedor->id }}" class="form-check-input"
                                            @if($sucursal->hasProvider($proveedor->pname))
                                             checked
                                            @endif
                                            >
                                        {{ $proveedor->pname }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{--  Field City --}}
                        <div class="form-group row">
                            <label for="ocity" class="col-md-4 col-form-label text-md-right">Ciudad</label>
                            <div class="col-md-6">
                                <input id="ocity" type="text" class="form-control @error('ocity') is-invalid @enderror" name="ocity" value="{{ $sucursal->ocity }}" required>
                                @error('ocity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Field Dpto --}}
                        <div class="form-group row">
                            <label for="ostate" class="col-md-4 col-form-label text-md-right">Departamento</label>
                            <div class="col-md-6">
                                <input id="ostate" type="text" class="form-control @error('ostate') is-invalid @enderror" name="ostate" value="{{ $sucursal->ostate }}" required>
                                @error('ostate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Field Direccion --}}
                        <div class="form-group row">
                            <label for="oaddress" class="col-md-4 col-form-label text-md-right">Dirección</label>
                            <div class="col-md-6">
                                <input id="oaddress" type="text" class="form-control @error('oaddress') is-invalid @enderror" name="oaddress" value="{{ $sucursal->oaddress }}" required>
                                @error('oaddress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Field Horario --}}
                        <div class="form-group row">
                            <label for="oopening" class="col-md-4 col-form-label text-md-right">Horario Atención</label>
                            <div class="col-md-6">
                                <input id="oopening" type="text" class="form-control @error('oopening') is-invalid @enderror" name="oopening" value="{{ $sucursal->oopening }}" required>
                                @error('oopening')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Field Contacto --}}
                        <div class="form-group row">
                            <label for="ocontact" class="col-md-4 col-form-label text-md-right">Horario Atención</label>
                            <div class="col-md-6">
                                <input id="ocontact" type="text" class="form-control @error('ocontact') is-invalid @enderror" name="ocontact" value="{{ $sucursal->ocontact }}" required>
                                @error('ocontact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Field Telefono --}}
                        <div class="form-group row">
                            <label for="ophone" class="col-md-4 col-form-label text-md-right">Teléfono</label>
                            <div class="col-md-6">
                                <input id="ophone" type="text" class="form-control @error('ophone') is-invalid @enderror" name="ophone" value="{{ $sucursal->ophone }}" required>
                                @error('ophone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Field Email --}}
                        <div class="form-group row">
                            <label for="oemail" class="col-md-4 col-form-label text-md-right">Teléfono</label>
                            <div class="col-md-6">
                                <input id="oemail" type="text" class="form-control @error('oemail') is-invalid @enderror" name="oemail" value="{{ $sucursal->oemail }}" required>
                                @error('oemail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Field Latitud --}}
                        <div class="form-group row">
                            <label for="olatitude" class="col-md-4 col-form-label text-md-right">Latitud</label>
                            <div class="col-md-6">
                                <input id="olatitude" type="text" class="form-control @error('olatitude') is-invalid @enderror" name="olatitude" value="{{ $sucursal->olatitude }}">
                                @error('olatitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  Field Longitud --}}
                        <div class="form-group row">
                            <label for="olongitude" class="col-md-4 col-form-label text-md-right">Latitud</label>
                            <div class="col-md-6">
                                <input id="olongitude" type="text" class="form-control @error('olongitude') is-invalid @enderror" name="olongitude" value="{{ $sucursal->olongitude }}">
                                @error('olongitude')
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
                        <a href="{{ route('admin.sucursales.index') }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Regresar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
