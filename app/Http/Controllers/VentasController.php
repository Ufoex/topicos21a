<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;


class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = '';

        if ($request->has('search')) {
            $query = $request->get('search');
        }
        $ventas = Venta::where('name','LIKE','%'.$query.'%')->orderBy('id','asc')->simplePaginate(5);
        $clientes = Cliente::get();
        $datos = Venta::get();
        $productos = Producto::get();
        return view('ventas.index',compact('productos','clientes','ventas','datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ventas = new Venta();
        $ventas->clientes_id = request('clientes_id');
        $ventas->productos_id = request('productos_id');
        $ventas->name = request('name');
        $ventas->metodoPago = request('metodoPago');
        $ventas->cantidad = request('cantidad');
        $ventas->total = request('total');
        $ventas->clientes_id = request('clientes_id');
        $ventas->productos_id = request('productos_id');

        $ventas->save();

        return redirect('/ventas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'metodoPago' => ['required'],
            'cantidad' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
        ]);

        $ventas = Venta::findOrFail($id);
        $ventas->name = $request->get('name');
        $ventas->metodoPago = $request->get('metodoPago');
        $ventas->cantidad = $request->get('cantidad');
        $ventas->total = $request->get('total');
        $ventas->update();

        return redirect('/ventas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ventas = Venta::findOrFail($id);

        $ventas->delete($id);

        return redirect()->route('ventas.index');
    }
}
