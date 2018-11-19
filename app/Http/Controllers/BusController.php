<?php
namespace ChuliosApp\Http\Controllers;
use Illuminate\Http\Request;
use ChuliosApp\Bus;
use ChuliosApp\Http\Requests\BusCreateRequest;
use Validator;
use Session;
use DB;
class BusController extends Controller
{
    public function index()
    {
      return view('bus.index');
    }
    public function listar_buses()
    {
        $bus=DB::table('bus as bus')
            ->select('ID_BUS','NOMBRE_PROP','PLACA_BUS','NUMERO_BUS','CAPACIDAD_BUS','FOTO_BUS','CEDULA_PROP','CELULAR_PROP','CODIGO_QR_BUS')
            ->paginate(5);
        return view('bus.listar_buses')->with('buses',$bus);                
    }
    public function store(BusCreateRequest $request)
    {
      if($request->ajax())
      {
        if($request->hasfile('foto'))
        {
          if($request->file('foto')->isValid())
          {
            $image=$request->foto;
            $name_image=$request->cedula.'.png';
            $dir_upload=public_path('storage/imagen_bus/');
            if($image->move($dir_upload,$name_image))
            {
              $qr='vacio';
              $bus=Bus::create([
                 'NOMBRE_PROP'=>$request->nombre,
                 'CEDULA_PROP'=>$request->cedula,
                 'CELULAR_PROP'=>$request->celular,
                 'PLACA_BUS'=>$request->placa,
                 'NUMERO_BUS'=>$request->numero,
                 'CAPACIDAD_BUS'=>$request->capacidad,
                 'FOTO_BUS'=>$name_image,
                 'CODIGO_QR_BUS'=>$qr,
               ]);
               if($bus)
               {
                  return response()->json(['success'=>'true']);
               }
               else{
                return response()->json(['success'=>'false']);
               }
            }
          }
        }
      }      
    }

    public function show($id)
    {
        return view('bus/show', ['value' => Bus::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('bus/edit', ['bus' => Bus::findOrFail($id)]);
    }
    public function update(Request $request, $id)
    {
      
      $foto_old=Bus::find($id);
      if($request->hasfile('foto'))
      {
         $dir_upload=public_path('storage/imagen_bus/');
          //borrar la imagen antigua
          if(!empty($foto_old->foto))
          {
            unlink($dir_upload.$foto_old->foto);
          }
          //upload new image
          if($request->file('foto')->isValid())
          {
            $image=$request->foto;
            $name_image=$request['cedula'].'.png';
            $dir_upload=public_path('storage/imagen_bus/');
            if($image->move($dir_upload,$name_image))
            {
              $qr="vacio";
              Bus::where('ID_BUS',$id)->update([
                'NOMBRE_PROP'=>$request['nombre'],
                'CEDULA_PROP'=>$request['cedula'],
                'CELULAR_PROP'=>$request['celular'],
                'PLACA_BUS'=>$request['placa'],
                'NUMERO_BUS'=>$request['numero'],
                'CAPACIDAD_BUS'=>$request['capacidad'],
                'FOTO_BUS'=>$name_image,
                'CODIGO_QR_BUS'=>$qr
              ]);
              Session::flash('success','Datos Actualizados Exitosamente');
              return redirect('/bus');
            }
          }
      }
      else
      {
        $qr="vacio";
        Bus::where('ID_BUS',$id)->update([
          'NOMBRE_PROP'=>$request['nombre'],
          'CEDULA_PROP'=>$request['cedula'],
          'CELULAR_PROP'=>$request['celular'],
          'PLACA_BUS'=>$request['placa'],
          'NUMERO_BUS'=>$request['numero'],
          'CAPACIDAD_BUS'=>$request['capacidad'],
          'CODIGO_QR_BUS'=>$qr
        ]);
        Session::flash('success','Datos Actualizados Exitosamente');
        return redirect('/bus');
      }

    }

    public function destroy(Request $request,$id)
    {
        //dd($id);
        //dd($request->all());
        $bus = Bus::findOrFail($id);
        $dir_upload=public_path('storage/imagen_bus/');
        //dd($dir_upload.$request->foto);
        unlink($dir_upload.$request->foto);
        $bus->delete();
        Session::flash('error','Datos Eliminados Exitosamente');
        return redirect('/bus');
  }
  public function createqr()
  {
     $bus = DB::table('bus')->where('CODIGO_QR_BUS', '=', 'vacio')->get();
      return view('bus.createqr',compact('bus'));
  }

  public function storeqr(Request $request)
  {
    //dd($request->all());
    //dd($request['CODIGO_QR_BUS']);
    if ($request['CODIGO_QR_BUS']!='vacio')
    {
      Bus::where('ID_BUS',$request['id'])->update([
        'CODIGO_QR_BUS'=>$request['qrbus']
      ]);
      dd('valiooooo');
    }
    else{
      Session::flash('error','Este Unidad de Bus ya cuenta con QR');
      return redirect('/bus');
    }
  }

  public function postqr(Request $request)
  {
    $placa=$request->placa;
    //dd($placa);
    return view('bus.postqr',compact('placa'));
    //return response()->json(['success'=>'QR bus Generado Exitosamente']);
  }




}
