<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 25/10/2018
 * Time: 8:13
 */

namespace ChuliosApp\Http\Controllers;

use ChuliosApp\Sede;
use ChuliosApp\Usuario;
use ChuliosApp\Recarga;
use Illuminate\Http\Request;
use ChuliosApp\Http\Requests\RecargaFormRequest;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Session;
use DB;

class RecargaController extends Controller
{
    public function _construct(){

    }

    public function index(Request $request){
        if ($request)
        {
            $recargas=DB::table('recarga')->get();
            $usuarios=Usuario::all();
            $sedes=Sede::all();
            return view('Recargas.index',["recargas"=>$recargas])->with(compact('usuarios','sedes'));
        }
    }

    public function store(RecargaFormRequest $request){
        $recarga=new Recarga();
        //$chulio->idchulio=$request->get('idchulio');
        $recarga->valor_recarga=$request['valor_recarga'];//usuario sera placa de bus
        $recarga->fecha_recarga=$request['fecha_recarga'];
        $recarga->USUARIO_id_usuario=$request['USUARIO_id_usuario'];
        $recarga->SEDE_id_sede=$request['SEDE_id_sede'];
        $recarga->save();
        Session::flash('success','Recarga Registrado Exitosamente');
        return redirect('Recargas');
    }

    public function create(){
        $usuarios=Usuario::all();
        $sedes=Sede::all();
        return view('Recargas\create',compact('usuarios','sedes'));//["buses"=>$buses]);
    }

    public function show($id){
        $usuarios=Usuario::all();
        $sedes=Sede::all();
        return view('Recargas\show',['recarga'=>Recarga::findOrFail($id)])->with(compact('usuarios','sedes'));
    }


    public function edit($id){
        $usuarios=Usuario::all();
        $sedes=Sede::all();
        return view('Recargas\edit',['recarga'=>Recarga::findOrFail($id)])->with(compact('usuarios','sedes'));
    }

    public function update(Request $request,$id){
        Recarga::where('id_recarga',$id)->update([
            'valor_recarga'=>$request->get('valor_recarga'),
            'fecha_recarga'=>$request->get('fecha_recarga'),
            'USUARIO_id_usuario'=>$request->get('USUARIO_id_usuario'),
            'SEDE_id_sede'=>$request->get('SEDE_id_sede')
        ]);
        Session::flash('success','Datos Actualizados Exitosamente');
        return Redirect::to('Recargas');
    }

    public function destroy($id){
        $recarga=Recarga::findOrFail($id);
        $recarga->delete();
        Session::flash('error','Datos Eliminados Exitosamente');
        return redirect('Recargas');
    }

}