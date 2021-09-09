@extends('layouts.main')

@section('content')

    @if (session('eliminar') == 'ok')
    <script>
        Lobibox.notify('success', {
        size: 'mini',
        rounded: true,
        delayIndicator: false,
        icon: 'fa fa-check-circle',
        sound: 'sound2.mp3',
        title: '¡Jugadores Eliminados!'
          });
    </script>
    @endif

    @if (session('error') == 'ok')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-inner--icon"><i class="fas fa-exclamation-circle"></i></span>
        <span class="alert-inner--text"><strong>ERROR!</strong>La fecha final, debe ser posterior a la fecha inicial. </span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('mensaje') == 'error')
    <div class="alert alert-danger" role="alert">
        <strong>ERROR!</strong> No se puede cambiar el estado!
    </div>
    @endif

    @if (session('estado'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-inner--text"><strong>Estado Actualizado!</strong></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <br>
    <br>

    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">

                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">SELECCIONAR JUGADORES</h3>
                        </div>
                        <div class="col text-right">
                            {{-- <a href="{{route('CrearTorneo')}}" class="btn btn-sm btn-primary">Jugadores</a>    --}}
                        </div>
                    </div>
                </div>
                                <div class="table-responsive">
                                    <table id="example" class="table align-items-center table-dark table-hover">
                                            
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Estado</th>
                                                    <th scope="col">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <form method="POST" class="players" action=" {{route('DeletePlayers')}} "> 
                                                    @csrf
                                                    @method('DELETE')                                     
                                                    
                                                    @foreach($players as $player)
                                                    <tr>
                                                        <th scope="row">
                                                            @if($player->estado == 2)
                                                                <label class="label">
                                                                    <input class="label__checkbox" type="checkbox" value="{{ $player->id }}" id="{{ $player->id }}" name="deletePlayers[]" disabled/>
                                                                    <span class="label__text">
                                                                        <span class="label__check">
                                                                            <i class="fa fa-check icon"></i>
                                                                        </span>
                                                                    </span>
                                                                </label>{{ $player->id }}
                                                            @else
                                                            <label class="label">
                                                                <input class="label__checkbox" type="checkbox" value="{{ $player->id }}" id="{{ $player->id }}" name="deletePlayers[]"/>
                                                                <span class="label__text">
                                                                    <span class="label__check">
                                                                        <i class="fa fa-check icon"></i>
                                                                    </span>
                                                                </span>

                                                            </label>{{ $player->id }}       
                                                            @endif 
                                                        </th>

                                                        <th scope="row">
                                                            {{ $player->name }}
                                                            <input type="hidden" name="player_name" value="{{ $player->name }}" id="{{ $player->id }}">
                                                        </th>
                                                        <td>{{ $player->email }}
                                                            {{-- <input type="hidden" name="player_name[]" value="{{ $player->id }}" id="{{ $player->name }}"> --}}
                                                            <input type="hidden" name="player_email" value="{{ $player->email }}" id="{{ $player->id }}">
                                                        </td>                                                             
                                                        <td>
                                                            {{-- <input type="hidden" name="player_name[]" value="{{ $player->id }}" id="{{ $player->name }}"> --}}
                                                            <input type="hidden" name="player_state" value="{{ $player->estado }}" id="{{ $player->id }}">
                                                            @if($player->estado == 1)       
                                                                    <span class="badge badge-dot">
                                                                        <i class="bg-success"></i>Activo
                                                                    </span>
                                                            @else
                                                                <span class="badge badge-dot mr-4">
                                                                    <i class="fa fa-lock" aria-hidden="true"></i>Bloqueado
                                                                </span>
                                                            @endif  
                                                        </td>
                                                        <td>
                                                            @if($player->estado == 2)
                                                            <a href="/Jugadores/Estado/{{$player->id}}/1" class="btn btn-success"><i class="bg-danger"></i>Habilitar</a>
                                                            @else
                                                            <a href="/Jugadores/Estado/{{$player->id}}/2" class="btn btn-danger"><i class="bg-success"></i>Bloquear</a>
                                                            @endif   
                                                        </td>
                                                    </tr>                                                           
                                                    @endforeach
                                                    
                                                    <button style="display: none" type="submit" class="btn btn-sm btn-primary" id="addPlayers" name="add">Agregar Jugadores</button>
                                                    <button style="display: none" type="submit" id="btnEliminar" class="btn btn-danger" name="delete">Eliminar Jugadores</button>
                                                </form>
                                                
                                            </tbody>
                                    </table>
                                </div>
                                                  
            </div>        
        </div>
    </div>
    
@endsection

@push('js')
    <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <script src="{{ asset('js/OptionsPlayer.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>  
@endpush