<div class="table table-responsive">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th><center>No</center></th>
                      <th><center>Nombre Propietario</center></th>
                      <th><center>Cedula</center></th>
                      <th><center>Celular</center></th>
                      <th><center>Numero Bus</center></th>
                      <th><center>Placa</center></th>
                      <th><center>Capacidad</center></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $no=1 ?>
                      @foreach($buses as $bus)
                        <tr>
                          <td><center>{{$no++}}</center></td>
                          <td><center>{{$bus->NOMBRE_PROP}}</center></td>
                          <td><center>{{$bus->CEDULA_PROP}}</center></td>
                          <td><center>{{$bus->CELULAR_PROP}}</center></td>
                          <td><center>{{$bus->NUMERO_BUS}}</center></td>
                          <td><center>{{$bus->PLACA_BUS}}</center></td>
                          <td><center>{{$bus->CAPACIDAD_BUS}}</center></td>
                          <td><a href="{{url('/bus/'.$bus->ID_BUS.'/edit')}}" class="btn btn-primary btn-sm">
                              Editar
                            </a>
                          </td>
                          <td>
                            <a href="{{url('/bus/'.$bus->ID_BUS)}}" class="btn btn-info btn-sm"> Detalle</a>
                          </td>
                            <td><button type="button" class="btn btn-danger btn-sm"
                              data-toggle="modal"
                              data-target="#eliminarbus{{$bus->ID_BUS}}">
                              Eliminar
                            </button>
                            <div id="eliminarbus{{$bus->ID_BUS}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel"><strong>Eliminar Bus</strong></h4>
                                          </div>
                                          <form class="form-horizontal" method="post" action="{{route('bus.destroy',$bus->ID_BUS)}}" enctype="multipart/form-data">
                                          <div class="modal-body">
                                            <center><h1>¿Quieres Eliminar estos datos?</h1></center>
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="foto" value="{{$bus->FOTO_BUS}}">
                                          </div>
                                          <div class="modal-footer">
                                             <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                             <button type="submit" class="btn btn-primary">Aceptar</button>
                                          </div>
                                           </form>
                                        </div>
                                      </div>
                              </div>
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
</div>
<div class="text-center">
   {{$buses->render()}}
</div>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/crudBus.js') }}"></script>