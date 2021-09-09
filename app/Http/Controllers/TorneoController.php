<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use App\Models\Player;
use App\Models\Ladder;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;

class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idTorneo)
    {
        // $torneo = Torneo::find($idTorneo);

        $players = Player::select('id', 'ranking', 'name', 'puntaje', 'estado')
        ->join('ladders', 'players.id', '=', 'ladders.id_player')
        ->join('torneos', 'players.idTorneo', '=', 'torneos.estado')
        ->get();
        // $players = Player::all();
        // $players = Player::paginate(5);
        return view('TorneoActivo', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre_torneo = $request->nombre_torneo;
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        $deletes2 = $request->deletePlayers2;

        if (isset($_POST['crearTorneo'])){

            $request->validate([
                'nombre_torneo' => 'required|string|max:20',
                'fecha_inicio' => 'required',
                'fecha_fin' => [
                    'required',
                    function ($attribute, $value, $fail) use ($request) {
                        if ($value <= $request['fecha_inicio']) {
                            $fail('The '.$attribute.' is invalid.');
                        }
                    },
                ],
            ]);
    
            // $fecha1 = Carbon::now();
            
            $fecha1 = new DateTime($fecha_inicio);
            $fecha2 = new DateTime($fecha_fin);
            // $fecha_fin = Carbon::now();
    
            // $fecha_inicio->toDateString();   
            // $fecha_fin->toDateString();   
            // foreach($deletes2 as $delete2){
    
                Torneo::create([
                    'nombre_torneo' => $nombre_torneo,
                    'fecha_inicio' => $fecha1,
                    'fecha_fin' => $fecha2,
                ]);

            return back()->with('torneo', 'ok');   

        } else {
            foreach($deletes2 as $delete2){
                Ladder::select('*')->where('player_id', '=', $delete2)->delete();
            } 
            return back()->with('eliminar', 'ok');
        }
    }
}
