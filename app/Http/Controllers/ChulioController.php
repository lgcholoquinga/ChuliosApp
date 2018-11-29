<?php

namespace ChuliosApp\Http\Controllers;

use Illuminate\Http\Request;

use ChuliosApp\Http\Requests;
use ChuliosApp\Chulio;
use ChuliosApp\Bus;
use Illuminate\Support\Facades\Redirect;
use ChuliosApp\Http\Requests\ChulioFormRequest;
use Validator;
use Session;
use DB;

class ChulioController extends Controller
{
    public function _construct(){

    }

    public function index(Request $request){
        if ($request)
        {
            $chulios=DB::table('chulio')->get();
            $buses=Bus::all();
            $val="";
            return view('Chulio.index',["chulios"=>$chulios])->with(compact('buses'));
        }
    }

    public function store(ChulioFormRequest $request){
        $chulio=new Chulio();
        //$chulio->idchulio=$request->get('idchulio');
        $chulio->usuario=$request['usuario'];//usuario sera placa de bus
        $chulio->nombre=$request['nombre'];
        $chulio->cedula=$request['cedula'];
        $chulio->celular=$request['celular'];
        $chulio->direccion=$request['direccion'];
        $chulio->contrasenia=$request['contrasenia'];//contraseña sera cedula propietario
        $chulio->BUS_id_bus=$request['BUS_id_bus'];
        $chulio->save();
        Session::flash('success','Chulio Registrado Exitosamente');
        return redirect('Chulio');
    }

    public function create(){
        $buses=Bus::all();
        return view('Chulio\create',compact('buses'));//["buses"=>$buses]);
    }

    public function show($id){
        $buses=Bus::all();
        return view('Chulio\show',['chulio'=>Chulio::findOrFail($id)])->with(compact('buses'));
    }


    public function edit($id){
        $buses=Bus::all();
        return view('Chulio\edit',['chulio'=>Chulio::findOrFail($id)])->with(compact('buses'));
    }

    public function update(Request $request,$id){
        Chulio::where('idchulio',$id)->update([
            'usuario'=>$request->get('usuario'),
            'nombre'=>$request->get('nombre'),
            'cedula'=>$request->get('cedula'),
            'celular'=>$request->get('celular'),
            'direccion'=>$request->get('direccion'),
            'contrasenia'=>$request->get('contrasenia'),
            'BUS_id_bus'=>$request->get('BUS_id_bus')
        ]);
        Session::flash('success','Datos Actualizados Exitosamente');
        return Redirect::to('Chulio');
    }

    public function destroy($id){
        $chulio=Chulio::findOrFail($id);
        $chulio->delete();
        Session::flash('error','Datos Eliminados Exitosamente');
        return redirect('Chulio');
    }
}
