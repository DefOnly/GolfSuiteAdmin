@extends('layouts.main')

@section('content')

@if(session('eliminar') == 'ok')
<div class="alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300">
   <div class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
       <span class="text-green-500">
           <svg fill="currentColor" style="width: 37px;
           height: 40px;"
                viewBox="0 0 20 20"
                class="h-6 w-6">
               <path fill-rule="evenodd"
                     d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                     clip-rule="evenodd"></path>
           </svg>
       </span>
   </div>
   <div class="alert-content ml-4">
       <div class="alert-title font-semibold text-lg text-green-800">
           ¡Jugadores Eliminados del Torneo!
       </div>
       <div class="alert-description text-sm text-green-600">
           Podrás agregarlos nuevamente y estarán en las últimas posiciones.
       </div>
   </div>
</div>
@endif

<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert" id="change_active" style="display: none">
    <div class="flex">
      <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
      <div>
        <p class="font-bold">Our privacy policy has changed</p>
        <p class="text-sm">Make sure you know how these changes affect you.</p>
      </div>
    </div>
</div>

<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert" id="change_lock" style="display: none">
    <div class="flex">
      <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
      <div>
        <p class="font-bold">Our privacy policy has changed</p>
        <p class="text-sm">Make sure you know how these changes affect you.</p>
      </div>
    </div>
</div>

<br>
<br>
<div class="container-fluid mt--7">
    <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                @foreach($torneos as $torneo)
                                <h3 class="mb-0" style="font-size: 23px; font-weight: 600;">JUGADORES DEL TORNEO <i class="fas fa-trophy"></i> "{{ $torneo->nombre_torneo }}" </h3>
                                @endforeach
                            </div>
                            <div class="col text-right">
                            </div>
                        </div>
                    </div>
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-dark table-hover">
                                                
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">Ranking</th>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Estado</th>
                                                        <th scope="col">Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <form method="POST" class="form-delete" action=" {{route('DeletePlayers2')}} "> 
                                                        @csrf
                                                        @method('DELETE')                                     
                                                        
                                                        @foreach($players as $player)
                                                        <tr>
                                                            <th scope="row">
                                                                @if($player->estado == 2)
                                                                    <label class="label">
                                                                        <input class="label__checkbox" type="checkbox" value="{{ $player->id }} " id="{{ $player->id }}" name="deletePlayers2[]" disabled/>
                                                                        <span class="label__text">
                                                                            <span class="label__check">
                                                                                <i class="fa fa-check icon"></i>
                                                                            </span>
                                                                        </span>
                                                                    </label>{{ $player->ranking }}
                                                                @else
                                                                <label class="label">
                                                                    <input class="label__checkbox" type="checkbox" value="{{ $player->id }} " id="{{ $player->id }}" name="deletePlayers2[]"/>
                                                                    <span class="label__text">
                                                                        <span class="label__check">
                                                                            <i class="fa fa-check icon"></i>
                                                                        </span>
                                                                    </span>
                                                                </label>{{ $player->ranking }}
                                                                @endif 
                                                            </th>
                                                            {{-- <th scope="row">{{ $player->ranking }}</th> --}}
                                                            <th scope="row">{{ $player->name }}</th>
                                                            {{-- <td><i class="fas fa-arrow-up text-success mr-3"></i>{{ $player->puntaje }}</td> --}}
                                                            <td>
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
                                                                <button><a href="/Jugadores/Estado/{{$player->id}}/1" class="btn btn-success"><i class="bg-danger"></i>Habilitar</a></button>
                                                                @else
                                                                <button><a href="/Jugadores/Estado/{{$player->id}}/2" class="btn btn-danger"><i class="bg-success"></i>Bloquear</a></button>
                                                                @endif   
                                                                {{-- <label class="custom-toggle">
                                                                    <input data-id=" {{ $player->id }}" class="my_checkbox" type="checkbox"
                                                                    data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive"
                                                                    {{ $player->id_Estado ? 'checked' : '' }}>
                                                                    <span class="custom-toggle-slider rounded-circle"></span>
                                                                </label>
                                                                <a id="lock" href="#"><i class="fa fa-lock" aria-hidden="true" style="display: none"></i></a> --}}
                                                            </td>
                                                        </tr>                                                           
                                                        @endforeach
                                                        
                                                        {{-- <button style="display: none" type="submit" class="btn btn-sm btn-primary" id="addPlayers" name="create">Crear Torneo</button> --}}
                                                        <button style="display: none" type="submit" id="btnEliminar" class="btn btn-danger" name="delete">Eliminar Jugadores</button>

                                                    </form>
                                                </tbody>
                                        </table>
                                    </div>

                                    
            </div>
                                {{-- Correo a jugadores agregados al torneo --}}
                                
                                {{-- <div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white m-4">
                                    <div class="flex flex-col min-h-full" style="background: white">
                                      <div class="pt-6 flex justify-center">
                                        <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaWQ9IkxheWVyXzEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDEwMCAxMDA7IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMDAgMTAwIiB4bWw6c3BhY2U9InByZXNlcnZlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48c3R5bGUgdHlwZT0idGV4dC9jc3MiPgoJLnN0MHtmaWxsOnVybCgjQmFja2dyb3VuZF8xM18pO30KCS5zdDF7ZmlsbDp1cmwoI3BhdGgtMl83Xyk7fQoJLnN0MntmaWx0ZXI6dXJsKCNBZG9iZV9PcGFjaXR5TWFza0ZpbHRlcik7fQoJLnN0M3tmaWxsOiNGRkZGRkY7fQoJLnN0NHttYXNrOnVybCgjbWFzay0zXzFfKTtmaWxsOiNGRkZGRkY7fQoJLnN0NXtmaWxsOnVybCgjU1ZHSURfMV8pO30KCS5zdDZ7ZmlsbDojMUUxRTFGO30KCS5zdDd7ZmlsbDp1cmwoI092YWxfNl8pO30KCS5zdDh7c3Ryb2tlOiMwMDAwMDA7c3Ryb2tlLXdpZHRoOjAuMzt9Cgkuc3Q5e2ZpbGw6IzJCMkEyQTt9Cgkuc3QxMHtmaWxsOiNGRjk1MDA7fQoJLnN0MTF7ZmlsbDp1cmwoI0JhY2tncm91bmRfMTRfKTt9Cgkuc3QxMntmaWxsOnVybCgjcGF0aC0yXzhfKTt9Cgkuc3QxM3tmaWx0ZXI6dXJsKCNBZG9iZV9PcGFjaXR5TWFza0ZpbHRlcl8xXyk7fQoJLnN0MTR7bWFzazp1cmwoI21hc2stM18yXyk7fQoJLnN0MTV7ZmlsbDojRkZGRkZGO2ZpbGwtb3BhY2l0eTowLjc7fQoJLnN0MTZ7ZmlsbDp1cmwoI0JhY2tncm91bmRfMTVfKTt9Cgkuc3QxN3tmaWxsOnVybCgjQmFja2dyb3VuZF8xNl8pO30KCS5zdDE4e2ZpbGw6dXJsKCNCYWNrZ3JvdW5kXzE3Xyk7fQoJLnN0MTl7ZmlsdGVyOnVybCgjQWRvYmVfT3BhY2l0eU1hc2tGaWx0ZXJfMl8pO30KCS5zdDIwe21hc2s6dXJsKCNtYXNrLTJfNl8pO2ZpbGwtb3BhY2l0eTowLjI5O30KCS5zdDIxe2ZpbHRlcjp1cmwoI0Fkb2JlX09wYWNpdHlNYXNrRmlsdGVyXzNfKTt9Cgkuc3QyMnttYXNrOnVybCgjbWFzay0yXzVfKTt9Cgkuc3QyM3tmaWxsOnVybCgjcGF0aC00XzJfKTt9Cgkuc3QyNHtmaWx0ZXI6dXJsKCNBZG9iZV9PcGFjaXR5TWFza0ZpbHRlcl80Xyk7fQoJLnN0MjV7bWFzazp1cmwoI21hc2stMl80Xyk7fQoJLnN0MjZ7ZmlsbDojQUFBQUFBO30KCS5zdDI3e2ZpbGw6dXJsKCNCYWNrZ3JvdW5kXzE4Xyk7fQoJLnN0Mjh7ZmlsbDojMTQxNDE2O30KCS5zdDI5e2ZpbHRlcjp1cmwoI0Fkb2JlX09wYWNpdHlNYXNrRmlsdGVyXzVfKTt9Cgkuc3QzMHttYXNrOnVybCgjbWFzay0yXzNfKTtmaWxsOnVybCgjQ2hhcnRfMV8pO3N0cm9rZTojRkZGRkZGO3N0cm9rZS13aWR0aDowLjc1O30KCS5zdDMxe2ZpbHRlcjp1cmwoI0Fkb2JlX09wYWNpdHlNYXNrRmlsdGVyXzZfKTt9Cgkuc3QzMnttYXNrOnVybCgjbWFzay0yXzJfKTt9Cgkuc3QzM3tmaWxsOiMwMUE2RjE7fQoJLnN0MzR7ZmlsdGVyOnVybCgjQWRvYmVfT3BhY2l0eU1hc2tGaWx0ZXJfN18pO30KCS5zdDM1e21hc2s6dXJsKCNtYXNrLTJfMV8pO2ZpbGw6Izc3Nzc3ODt9Cgkuc3QzNntmaWxsOnVybCgjQmFja2dyb3VuZF8xOV8pO30KCS5zdDM3e2ZpbGw6IzJFMkUzMDt9Cgkuc3QzOHtmaWxsOiM3RjdGN0Y7fQoJLnN0Mzl7ZmlsbDojNzc3Nzc3O30KCS5zdDQwe2ZpbGw6bm9uZTt9Cgkuc3Q0MXtmaWxsOnVybCgjU1ZHSURfMl8pO30KCS5zdDQye2ZpbGw6dXJsKCNPdmFsXzdfKTt9Cgkuc3Q0M3tmaWx0ZXI6dXJsKCNBZG9iZV9PcGFjaXR5TWFza0ZpbHRlcl84Xyk7fQoJLnN0NDR7bWFzazp1cmwoI21hc2stM18zXyk7ZmlsbDojRkYxNDE0O30KCS5zdDQ1e2ZpbHRlcjp1cmwoI0Fkb2JlX09wYWNpdHlNYXNrRmlsdGVyXzlfKTt9Cgkuc3Q0NnttYXNrOnVybCgjbWFzay0yXzhfKTt9Cgkuc3Q0N3tmaWxsOiMxQkFERjg7fQoJLnN0NDh7ZmlsbDojNjNEQTM4O30KCS5zdDQ5e2ZpbHRlcjp1cmwoI0Fkb2JlX09wYWNpdHlNYXNrRmlsdGVyXzEwXyk7fQoJLnN0NTB7bWFzazp1cmwoI21hc2stMl83Xyk7fQoJLnN0NTF7ZmlsbDojQjdCN0I3O30KCS5zdDUye2ZpbHRlcjp1cmwoI0Fkb2JlX09wYWNpdHlNYXNrRmlsdGVyXzExXyk7fQoJLnN0NTN7bWFzazp1cmwoI21hc2stMl8yNF8pO2ZpbGw6dXJsKCNSZWRfMV8pO30KCS5zdDU0e2ZpbHRlcjp1cmwoI0Fkb2JlX09wYWNpdHlNYXNrRmlsdGVyXzEyXyk7fQoJLnN0NTV7bWFzazp1cmwoI21hc2stMl8yM18pO2ZpbGw6dXJsKCNPcmFuZ2VfMV8pO30KCS5zdDU2e2ZpbHRlcjp1cmwoI0Fkb2JlX09wYWNpdHlNYXNrRmlsdGVyXzEzXyk7fQoJLnN0NTd7bWFzazp1cmwoI21hc2stMl8yMl8pO2ZpbGw6dXJsKCNZZWxsb3dfMV8pO30KCS5zdDU4e2ZpbHRlcjp1cmwoI0Fkb2JlX09wYWNpdHlNYXNrRmlsdGVyXzE0Xyk7fQoJLnN0NTl7bWFzazp1cmwoI21hc2stMl8yMV8pO2ZpbGw6dXJsKCNHcmVlbl8xXyk7fQoJLnN0NjB7ZmlsdGVyOnVybCgjQWRvYmVfT3BhY2l0eU1hc2tGaWx0ZXJfMTVfKTt9Cgkuc3Q2MXttYXNrOnVybCgjbWFzay0yXzIwXyk7ZmlsbDp1cmwoI1R1cnF1b2lzZV8xXyk7fQoJLnN0NjJ7ZmlsdGVyOnVybCgjQWRvYmVfT3BhY2l0eU1hc2tGaWx0ZXJfMTZfKTt9Cgkuc3Q2M3ttYXNrOnVybCgjbWFzay0yXzE5Xyk7ZmlsbDp1cmwoI0JsdWVfMV8pO30KCS5zdDY0e2ZpbHRlcjp1cmwoI0Fkb2JlX09wYWNpdHlNYXNrRmlsdGVyXzE3Xyk7fQoJLnN0NjV7bWFzazp1cmwoI21hc2stMl8xOF8pO2ZpbGw6dXJsKCNQdXJwbGVfMV8pO30KCS5zdDY2e2ZpbHRlcjp1cmwoI0Fkb2JlX09wYWNpdHlNYXNrRmlsdGVyXzE4Xyk7fQoJLnN0Njd7bWFzazp1cmwoI21hc2stMl8xN18pO2ZpbGw6dXJsKCNQaW5rXzFfKTt9Cgkuc3Q2OHtmaWxsOnVybCgjQmFja2dyb3VuZF8yMF8pO30KCS5zdDY5e2ZpbGw6IzM1MzUzNTt9Cgkuc3Q3MHtmaWxsOnVybCgjU1ZHSURfM18pO30KPC9zdHlsZT48ZyBpZD0iU3ltYm9sc18zXyI+PGcgaWQ9IkdyYXBoaWNzLV94MkZfLUFwcC1JY29ucy1feDJGXy1NYWlsIj48ZyBpZD0iTWFpbC1JY29uIj48bGluZWFyR3JhZGllbnQgZ3JhZGllbnRUcmFuc2Zvcm09Im1hdHJpeCg2MCAwIDAgLTYwIDQwNzEgNDQ5MDEpIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgaWQ9IkJhY2tncm91bmRfMTNfIiB4MT0iLTY3LjAxNjciIHgyPSItNjcuMDE2NyIgeTE9Ijc0OC4yNjYyIiB5Mj0iNzQ2Ljc2NjciPjxzdG9wIG9mZnNldD0iMCIgc3R5bGU9InN0b3AtY29sb3I6IzFFNTFFRSIvPjxzdG9wIG9mZnNldD0iMSIgc3R5bGU9InN0b3AtY29sb3I6IzE5RTZGRiIvPjwvbGluZWFyR3JhZGllbnQ+PHBhdGggY2xhc3M9InN0MCIgZD0iTTYzLjYsNWM5LDAsMTMuNSwwLDE4LjQsMS41YzUuMywxLjksOS41LDYuMSwxMS40LDExLjRDOTUsMjIuOCw5NSwyNy40LDk1LDM2LjR2MjcuMiAgICAgYzAsOSwwLDEzLjUtMS41LDE4LjRjLTEuOSw1LjMtNi4xLDkuNS0xMS40LDExLjRDNzcuMiw5NSw3Mi42LDk1LDYzLjYsOTVIMzYuNGMtOSwwLTEzLjUsMC0xOC40LTEuNUMxMi43LDkxLjUsOC41LDg3LjQsNi42LDgyICAgICBDNSw3Ny4yLDUsNzIuNyw1LDYzLjZWMzYuNGMwLTksMC0xMy41LDEuNS0xOC40QzguNSwxMi43LDEyLjcsOC41LDE4LDYuNkMyMi44LDUsMjcuNCw1LDM2LjQsNUg2My42eiIgaWQ9IkJhY2tncm91bmRfMl8iLz48cGF0aCBjbGFzcz0ic3QzIiBkPSJNNzguOSw2OS41Yy0wLjEsMC0wLjMsMC4xLTAuNCwwLjFoLTU3Yy0wLjEsMC0wLjMsMC0wLjQtMC4xbDAsMGwxNy44LTE3LjhsMy44LDMuOWM0LjEsNC4yLDEwLjYsNC4yLDE0LjcsMCAgICAgbDMuOC0zLjlMNzguOSw2OS41TDc4LjksNjkuNUw3OC45LDY5LjV6IE04MCw2Ny42VjMyLjNjMC0wLjIsMC0wLjQtMC4xLTAuNUM3OS44LDMyLDYyLjIsNTAuMiw2Mi4yLDUwLjJsMTcuOCwxNy44ICAgICBDODAsNjcuOCw4MCw2Ny43LDgwLDY3LjZMODAsNjcuNnogTTIwLDY3LjdWMzIuNWMwLTAuMiwwLTAuNCwwLjEtMC41YzAuMSwwLjIsMTcuNywxOC40LDE3LjcsMTguNEwyMC4xLDY4LjEgICAgIEMyMCw2OCwyMCw2Ny44LDIwLDY3LjdMMjAsNjcuN3ogTTc5LDMwLjZMNTYuMyw1My44Yy0zLjUsMy41LTkuMSwzLjUtMTIuNSwwTDIxLjEsMzAuNkMyMSwzMC41LDc5LDMwLjYsNzksMzAuNkw3OSwzMC42eiIvPjwvZz48L2c+PC9nPjwvc3ZnPg==" alt="" class="w-1/5">
                                      </div>
                                <div class="px-6 py-6 flex-grow">
                                  <div class="text-gray-700 font-medium text-xl mb-2">Enviar invitaciones al torneo?</div>
                                  <p class="text-gray-600 text-sm">
                                    De esta manera los jugadores sabrán la información del torneo.
                                  </p>
                                </div>
                                <div class="px-6 py-4 border-t">
                                  <div class="flex flex-row justify-between">
                                    <div class="flex flex-row">
                                      <button class="inline-block px-4 py-1 font-medium text-blue-500">Enviar</button>
                                      <button class="inline-block pl-6 py-1 font-medium text-blue-500">Cancelar</button>
                                    </div>
                                  </div>
                                  </div>
                                </div>
                              </div> --}}                                           
        </div>        
        {{ $players->links() }}
    </div>

@endsection

@push('js')
    <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <script src="{{ asset('js/OptionsPlayer.js')}}"></script>
@endpush