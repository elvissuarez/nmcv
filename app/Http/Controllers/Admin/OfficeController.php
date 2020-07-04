<?php

namespace App\Http\Controllers\Admin;

use App\CruzVerde\Office;
use App\CruzVerde\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 *
 */
class OfficeController extends Controller
{

  /**
   * Sure user is logged in
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index() {
    $sucursales = Office::all();
    $proveedores = Provider::all();
    return view('admin.offices.index')->with([
      'sucursales' => $sucursales,
      'proveedores' => $proveedores,
    ] );
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $proveedores = Provider::all();
    return view('admin.offices.create')->with('proveedores', $proveedores);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   *
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    $rules = [
      'ocode'          => 'required|numeric|max:255|unique:offices,ocode',
      'oname'         => 'required|max:255|unique:offices,oname',
      'ochannel'     => 'required|max:200',
      'oip'              => 'required|ip|unique:offices,oip',
      'ocity'           => 'required|max:200',
      'ostate'          => 'required|max:200',
      'oaddress'     => 'required|max:200',
      'oopening'    => 'required|max:200',
      'ocontact'     => 'required|max:200',
      'ophone'       => 'required|max:200',
      'oemail'        => 'required|max:200',
    ];

    $request->validate($rules);

    $office = Office::create($request->all());

    $provider = Provider::find($request->providers);
    $office->providers()->attach($provider);

    return redirect()->route('admin.sucursales.index')->with('success', 'Sucursal Creada Correctamente. ');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $office = Office::find($id);
    $proveedores = Provider::all();
    return view('admin.offices.edit')->with([
      'sucursal' => $office,
      'proveedores' => $proveedores,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  int                      $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $rules = [
      'oname'         => 'required|max:255',
      'ochannel'     => 'required|max:200',
      'ocity'           => 'required|max:200',
      'ostate'          => 'required|max:200',
      'oaddress'     => 'required|max:200',
      'oopening'    => 'required|max:200',
      'ocontact'     => 'required|max:200',
      'ophone'       => 'required|max:200',
      'oemail'        => 'required|max:200',
    ];
    $request->validate($rules);

    $office = Office::find($id);
    $office->update($request->all());
    // update providers for office
    $provider = Provider::find($request->providers);
    $office->providers()->sync($provider);

    return redirect()->route('admin.sucursales.index')
      ->with('success', 'Sucursal Actualizada');
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $office = Office::find($id);
    $office->providers()->detach();
    $office->delete();
    return redirect()->route('admin.sucursales.index')
      ->with('success', 'La Sucursal Se Eliminó');
  }
}
