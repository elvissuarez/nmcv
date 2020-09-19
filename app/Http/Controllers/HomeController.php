<?php

namespace App\Http\Controllers;

use App\Http\Controllers\LinkController;
use Illuminate\Http\Request;
use App\CruzVerde\Office;
use App\CruzVerde\Provider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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
        // $lc = new LinkController();
        // dump($lc->healthCheck("192.168.1.90"));
        $sucursales = Office::all();
        $proveedores = Provider::all();
        return view('home')->with([
            'sucursales' => $sucursales,
            'proveedores' => $proveedores,
        ]);
    }
}
