<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Provider;

class ProductoController extends Controller
{

    public function __construct()
    {
        //$this->middleware(['role:Admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $proveedores = Provider::get();
        $productos = Producto::get();
        return view('productos.index', compact('proveedores', 'productos'));
//        if($request){
//            $proveedores = Provider::get();
//            $query = trim($request->get('search'));
//            $productos = Producto::where('name','LIKE','%'.$query.'%')->orderBy('id','asc')->get();
//            return view('productos.index',['productos' => $productos, 'search' => $query, 'proveedores' => $proveedores]);
//
//        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $producto = new Producto();

        $producto->name = request('name');
        $producto->descripcion = request('descripcion');
        $producto->cantidad = request('cantidad');
        $producto->precio = request('precio');
        $producto->providers_id = request('provider_id');

        $producto->save();

        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('productos.show',['producto'=> Producto::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('productos.edit',['producto'=> Producto::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'descripcion' => ['required'],
            'cantidad' => ['required'],
            'precio' => ['required'],
        ]);

        $producto = Producto::findOrFail($id);
        $producto->name = $request->get('name');
        $producto->descripcion = $request->get('descripcion');
        $producto->cantidad = $request->get('cantidad');
        $producto->precio = $request->get('precio');
        $producto->update();

        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        $producto->delete($id);

        return redirect()->route('producto.create');
    }
}
