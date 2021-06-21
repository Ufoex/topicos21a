<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = '';

        if ($request->has('search')) {
            $query = $request->get('search');
        }    
        $proveedores = Provider::where('name','LIKE','%'.$query.'%')->orderBy('id','asc')->simplePaginate(5);

        return view('proveedores.index', compact('proveedores','query'));
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
        $provider = new Provider();

        $provider->name = request('name');
        $provider->rfc = request('rfc');
        $provider->email = request('email');
        $provider->direccion = request('direccion');
        $provider->telefono = request('telefono');

        $provider->save();

        return redirect('/proveedores');
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
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'rfc' => ['required'],
            'email' => ['required'],
            'direccion' => ['required'],
            'telefono' => ['required'],
        ]);

        $provider = Provider::findOrFail($id);
        $provider->name = $request->get('name');
        $provider->rfc = $request->get('rfc');
        $provider->email = $request->get('email');
        $provider->direccion = $request->get('direccion');
        $provider->telefono = $request->get('telefono');
        $provider->update();

        return redirect('/proveedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);

        $provider->delete($id);

        return redirect()->route('proveedores.index');
    }
}
