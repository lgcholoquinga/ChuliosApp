<?php
namespace ChuliosApp\Http\Controllers;
use Illuminate\Http\Request;
use ChuliosApp\Bus;
use Validator;
class BusController extends Controller
{
    public function index()
    {
      $bus = Bus::orderBy('ID_BUS', 'desc')->paginate(6);
      //$bus=Bus::all();
      return view('bus.index',compact('bus'));
    }
    public function store(Request $request)
    {
      Bus::create([
         'NOMBRE_PROP'=>$request['nombre'],
         'CEDULA_PROP'=>$request['cedula'],
         'CELULAR_PROP'=>$request['celular'],
         'PLACA_BUS'=>$request['placa'],
         'NUMERO_BUS'=>$request['numero'],
         'CAPACIDAD_BUS'=>$request['capacidad'],
         'FOTO_BUS'=>$request->file('foto')->store('public/imagen_bus'),
         'CODIGO_QR_BUS'=>$request->file('qr')->store('public/imagen_qr_bus'),
       ]);

      return redirect('/bus');
    }
    public function show($id)
    {
        return view('/bus', ['bus' => Bus::findOrFail($id)]);
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
