<?php

namespace App\Http\Controllers\Admin;

use App\CruzVerde\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProviderController extends Controller
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
    public function index()
    {
        $proveedores = Provider::all();
        return view('admin.providers.index')->with('proveedores', $proveedores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'pname'        => 'required|max:200|unique:providers,pname',
            'pcontact'     => 'required|max:200',
            'pphone'       => 'required|max:200',
            'pemail'        => 'required|max:200|unique:providers,pemail',
            'pcontract'    => 'required|max:200',
            'pactive'       => 'required|boolean'
        ];

        $request->validate($rules);

        Provider::create($request->all());

        return redirect()->route('admin.proveedores.index')->with('success', 'Proveedor Creado Correctamente. ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provider = Provider::find($id);
        return view('admin.providers.edit')->with([
            'proveedor' => $provider,
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
            'pcontact'     => 'required|max:200',
            'pphone'       => 'required|max:200',
            'pemail'        => 'required|max:200',
            'pcontract'    => 'required|max:200'
        ];
        $request->validate($rules);

        $provider = Provider::find($id);
        $provider->update($request->all());

        return redirect()->route('admin.proveedores.index')
            ->with('success', 'Proveedor Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider = Provider::find($id);
        $provider->delete();
        return redirect()->route('admin.proveedores.index') ->with('success', 'Proveedor Eliminado');
    }
}
