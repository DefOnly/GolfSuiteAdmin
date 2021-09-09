<h1 class="hTorneo"><i class="fas fa-trophy"></i>Definir Torneo</h1>
                <div class="container">  
                                            
                <form method="POST" action=" {{route('Torneo')}} ">
                @csrf

                    <div class="row">            
                            <div class="form-group" id="group">

                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre del Torneo" name="nombre_torneo" value="{{old('nombre_torneo')}}">

                                {!! $errors->first('nombre_torneo',               
                                '
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-inner--icon"><i class="fas fa-exclamation-circle"></i></span>
                                    <span class="alert-inner--text"><strong>ERROR!</strong> El nombre del torneo es obligatorio. </span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                ') !!}

                                    <h3>Fecha de Inicio</h3>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control datepicker" name="fecha_inicio" placeholder="Select date" type="text" value="">
                                    </div>
                                    
                                    {!! $errors->first('fecha_inicio',               
                                    '
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="alert-inner--icon"><i class="fas fa-exclamation-circle"></i></span>
                                        <span class="alert-inner--text"><strong>ERROR!</strong> La fecha de inicio no puede ser anterior a la actual. </span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    ') !!}
                            
                                    <h3>Fecha de Fin</h3>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control datepicker" name="fecha_fin" placeholder="Select date" type="text" value="">
                                    </div>

                                    {!! $errors->first('fecha_fin',               
                                    '
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="alert-inner--icon"><i class="fas fa-exclamation-circle"></i></span>
                                        <span class="alert-inner--text"><strong>ERROR!</strong> La fecha final, debe ser posterior a la fecha inicial. </span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    ') !!}                                                                  
                                    <button type="submit" name="crearTorneo" class="crearTorneo">Crear Torneo</button>
                                    
                            </div> 
                        </div>
                </form>
                </div>
                <br>
                                <div class="table-responsive">
                                    <div class="card-header border-0">
                                        <div class="row align-items-center">
                                   
                                                    <div class="col">
                                                        <h3 class="mb-0" style="font-size: 20px">SELECCIONE TORNEO Y JUGADORES</h3>
                                                    </div>
                                                    <div class="col text-right">
                                                        
                                                            {{-- <div class="form-group mb-0"> --}}
                                                                <div class="input-group input-group-alternative">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                                    </div>
                                                                    <input wire:model="search" class="form-control" placeholder="Buscar" type="search">
                                                                </div>
                                                            {{-- </div> --}}
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <table id="example" class="table align-items-center table-dark table-hover">
                                                    
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Nombre</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Estado</th>
                                                            <th scope="col">Torneo</th>
                                                            <th scope="col">Opciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <form method="POST" class="players" action=" {{route('DeletePlayers')}} ">
                                                            @csrf
                                                            @method('DELETE')      

                                                                {{-- <div class="main flex border rounded-full overflow-hidden m-4 select-none">
                                                                  <div class="title py-3 my-auto px-5 bg-blue-500 text-white text-sm font-semibold mr-3" style="background: #172b4d">SELECCIONE TORNEO</div>
                                                                  @foreach($torneos as $torneo)
                                                                  <label for="{{ $torneo->idTorneo }}" class="flex radio p-2 cursor-pointer">
                                                                    <input class="my-auto transform scale-125" type="radio" id="{{ $torneo->idTorneo }}" value="{{$torneo->idTorneo}}" name="torneos[]"
                                                                    style="position: relative;
                                                                    padding: 8px;
                                                                    right: 8px;">{{$torneo->nombre_torneo}}
                                                                  </label>
                                                                  @endforeach
                                                                </div> --}}
                                                                
                                                                {{-- <style>
                                                                    .torneos {
                                                                        color:white;
                                                                        background-color: #2dce89;
                                                                                                                                    
                                                                }
                                                                </style> --}}
                                                                {{-- <div class="flex justify-center items-center h-screen"> --}}
                                                                <div class="bg-gray-200 rounded-lg" style="display: inline-block">
                                                                <div class="inline-flex rounded-lg">
                                                                    @foreach($torneos as $torneo)
                                                                <input class="torneos" type="radio" id="{{ $torneo->idTorneo }}" value="{{$torneo->idTorneo}}" name="torneos[]"/>
                                                                <label for="{{ $torneo->idTorneo }}" class="radio text-center self-center py-2 px-4 rounded-lg cursor-pointer hover:opacity-75">{{$torneo->nombre_torneo}}</label>
                                                                 @endforeach
                                                                </div>
                                                                {{-- <div class="inline-flex rounded-lg">
                                                                <input type="radio" name="room_type" id="roomPublic" hidden/>
                                                                <label for="roomPublic" class="radio text-center self-center py-2 px-4 rounded-lg cursor-pointer hover:opacity-75">Public</label>
                                                                </div> --}}
                                                                </div>
                                                                {{-- </div> --}}
           
                                                                {!! $errors->first('torneos',               
                                                                '
                                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                    <span class="alert-inner--icon"><i class="fas fa-exclamation-circle"></i></span>
                                                                    <span class="alert-inner--text"><strong>ERROR!</strong></span>
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                ') !!}   
  
                                                            @foreach($ladders as $ladder)
                                                            <input type="hidden" value="{{ $ladder->player_id }}" id="{{ $ladder->player_id }}" name="ladders[]">
                                                            @endforeach

                                                            @foreach($players as $player)
                                                            

                                                            @if($player->torneo_id != null)
                                                            
                                                            <tr style="background: #6b728096;
                                                            color: white">
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
                                                                        <input class="label__checkbox" type="checkbox" value="{{ $player->id }}" id="{{ $player->id }}" name="deletePlayers[]" disabled/>
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
                                                                @foreach($torneos as $torneo)
                                                                @if($player->torneo_id == $torneo->idTorneo)
                                                                <td><strong>{{$torneo->nombre_torneo}}</strong></td>
                                                                @endif
                                                                @endforeach 
                                                                <td>
                                                                    @if($player->estado == 2)
                                                                    <a href="/Jugadores/Estado/{{$player->id}}/1" class="btn btn-success"><i class="bg-danger"></i>Habilitar</a>
                                                                    @else
                                                                    <a href="/Jugadores/Estado/{{$player->id}}/2" class="btn btn-danger"><i class="bg-success"></i>Bloquear</a>
                                                                    @endif   
                                                                </td>
                                                            </tr>

                                                            @else
                                                            
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
                                                                <td><strong>Sin torneo</strong></td>
                                                                <td>
                                                                    @if($player->estado == 2)
                                                                    <a href="/Jugadores/Estado/{{$player->id}}/1" class="btn btn-success" id="habilitado"><i class="bg-danger"></i>Habilitar</a>
                                                                    @else
                                                                    <a href="/Jugadores/Estado/{{$player->id}}/2" class="btn btn-danger" id="bloqueado"><i class="bg-success"></i>Bloquear</a>
                                                                    @endif   
                                                                </td>
                                                            </tr>                                                           
                                                            @endif
                                                            
                                                            @endforeach
                                                            
                                                            
                                                            <button style="display: none" type="submit" class="btn btn-sm btn-primary" id="addPlayers" name="add">Agregar Jugadores</button>
                                                            {{-- <button style="display: none" type="submit" id="btnEliminar" class="btn btn-danger" name="delete">Eliminar Jugadores</button> --}}
                                                        </form>
                                                        
                                                    </tbody>
                                            </table>
                                        </div>
                                        {{ $players->links() }}
                                        <br>