@extends('layouts.main')

@section('content')

    @if(session('eliminarTorneo') == 'ok')
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
               ¡Torneo Eliminado!
           </div>
       </div>
   </div>
   @endif

    @foreach ($torneos as $torneo)
    <div class="card" style="width: 21rem; left: 2px">
        <video src="video/golf-player.mp4" autoplay muted loop class="active"></video>
        <div class="card-body">
          <h2 class="card-title" style="font-weight: 500;
          font-size: 1.4rem">{{$torneo->nombre_torneo}}</h2>
          <p class="card-text" style="font-size: 20px">Torneo Activo</p>
            <a href="/Jugadores/{{$torneo->idTorneo}}" class="btn btn-primary">Ver Jugadores</a>
            <form method="GET" class="form-torneo" action="/EliminarTorneo/{{$torneo->idTorneo}}" style="height: 0px;">
              @csrf
              <button type="submit">
                <a href="/EliminarTorneo/{{$torneo->idTorneo}}" class="EliminarTorneo"><i class="fas fa-trash-alt"></i></a>
              </button>
            </form>
        </div>
    </div>
    @endforeach

@endsection

@push('js')
    <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/OptionsPlayer.js')}}"></script>
@endpush