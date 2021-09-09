@extends('layouts.main')

@section('content')

     @if(session('exito') == 'ok')
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
                ¡Jugadores Agregados!
            </div>
            <div class="alert-description text-sm text-green-600">
                Puedes verlos en torneos creados.
            </div>
        </div>
    </div>
    @endif

     @if(session('torneo') == 'ok')
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
                ¡Torneo Creado!
            </div>
            <div class="alert-description text-sm text-green-600">
                Puedes ya agregar los jugadores.
            </div>
        </div>
    </div>
    @endif
    
    @if (session('error') == 'ok')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-inner--icon"><i class="fas fa-exclamation-circle"></i></span>
        <span class="alert-inner--text"><strong>ERROR! </strong>¡Uno o más jugadores ya están agregados o se encuentran en otro Torneo!</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('error2') == 'ok')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-inner--icon"><i class="fas fa-exclamation-circle"></i></span>
        <span class="alert-inner--text"><strong>ERROR! </strong>¡Debe seleccionar el torneo!</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('crear'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-inner--text"><strong>Torneo Creado!</strong></span>
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

                @include('livewire.tablePlayers')

            </div>        
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <script src="{{ asset('js/OptionsPlayer.js')}}"></script>
@endpush