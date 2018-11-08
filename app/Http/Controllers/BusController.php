<?php
namespace ChuliosApp\Http\Controllers;
use Illuminate\Http\Request;
use ChuliosApp\Bus;
use ChuliosApp\Http\Requests\BusRequest;
use Validator;
use Session;
class BusController extends Controller
{
    public function index()
    {
      //$bus = DB::table('bus')->paginate(5);
      $bus = Bus::all();
      return view('bus.index',compact('bus'));
    }
    public function store(BusRequest $request)
    {
      if($request->hasfile('foto'))
      {
         if($request->file('foto')->isValid())
         {
           $image=$request->foto;
           $name_image=$request['cedula'].'.png';
           $dir_upload=public_path('storage/imagen_bus/');
           if($image->move($dir_upload,$name_image))
           {
             $qr='vacio';
             Bus::create([
                'NOMBRE_PROP'=>$request['nombre'],
                'CEDULA_PROP'=>$request['cedula'],
                'CELULAR_PROP'=>$request['celular'],
                'PLACA_BUS'=>$request['placa'],
                'NUMERO_BUS'=>$request['numero'],
                'CAPACIDAD_BUS'=>$request['capacidad'],
                'FOTO_BUS'=>$name_image,
                'CODIGO_QR_BUS'=>$qr,
              ]);
              Session::flash('success','Unidad Bus Registrado Exitosamente');
              return redirect('/bus');
           }
         }
      }
      else {
        echo "necesitas imagen";
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
        //dd($request->foto);
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
     $bus = Bus::all();
      return view('bus.createqr',compact('bus'));
  }
}
