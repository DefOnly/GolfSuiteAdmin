@extends('layouts.main')

@section('content')
    
@include('layouts.headers.cards')

                @livewire('player-component')
                
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">JUGADORES</h3>
                            </div>
                            <div class="col text-right">
                                <a href="" class="btn btn-sm btn-primary">Ver Jugadores</a>
                                <a href="#!" class="btn btn-sm btn-primary">Crear Torneo</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Ranking</th>
                                    <th scope="col">Puntaje</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

@include('layouts.footers.auth')
@endsection

@push('js')
    <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/dist/Chart.extension.js') }}"></script>
@endpush