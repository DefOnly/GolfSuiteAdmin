<?php

// namespace App\Http\Livewire;
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Player;
use App\Models\Ladder;
use App\Models\Torneo;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Livewire\WithPagination;

class PlayerController extends Controller
{
    // use WithPagination;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index($torneo_id)
    {
        // $players = Player::all();
        // $players = Player::paginate(6);
        // return view('tablePlayers', compact('players'));

            $players = Player::select('id', 'ranking', 'name', 'estado')
            ->join('ladders', 'players.id', '=', 'ladders.player_id')
            ->where('players.torneo_id', '=', $torneo_id)
            ->orderBy('id', 'asc')
            ->paginate(10);

            $torneos = Torneo::select('nombre_torneo')->where('torneos.idTorneo', '=', $torneo_id)->get();

            return view('TorneoActivo', compact('players'), compact('torneos'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {   
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function PlayerStates($id, $estado){

        $player = Player::find($id);

        if($player == null){
            return back()->with('error', 'ERROR!, No se puede cambiar el estado!');
        }
        $player->update(['estado' => $estado]);
        notify()->success('', 'Estado Actualizado!');
        return back();

    }
    //AGREGAR JUGADORES A UN TORNEO
    public function DeletePlayers(Request $request){

        $deletes = $request->deletePlayers;
        $ladders = $request->ladders;
        $torneos = $request->torneos;

        if (isset($_POST['add'])) {

            if($ladders == null){
                foreach($deletes as $delete){
                    
                    if($torneos == ''){
                        return back()->with('error2', 'ok');
                    } else{
                            foreach($torneos as $torneo){

                            Ladder::insert(['player_id' => $delete,
                                            'torneo_id' => $torneo]);
                        }

                    }
                    
                    foreach($deletes as $delete){

                        $torneoPlayer = Player::select('torneo_id')
                        ->where('players.id', '=', $delete)
                        ->update(['torneo_id' => implode(',', $torneos)]);
                    }
                }
                return back()->with('exito', 'ok');

            } else {

                
                foreach($deletes as $delete){
                    foreach($ladders as $ladder){
                        if($torneos == ''){
                            return back()->with('error2', 'ok');
                        } else if($delete == $ladder){
                                return back()->with('error', 'ok');
                                }                  
                    }
                    foreach($torneos as $torneo){

                        Ladder::insert(['player_id' => $delete,
                                        'torneo_id' => $torneo]);
                    }
                }
                   
                foreach($deletes as $delete){

                    $torneoPlayer = Player::select('torneo_id')
                        ->where('players.id', '=', $delete)
                        ->update(['torneo_id' => implode(',', $torneos)]);
                }
    
            return back()->with('exito', 'ok');
            }

            
        } else {
            
            foreach($deletes as $delete){
                Ladder::select('*')->where('player_id', '=', $delete)->delete();       
                Player::select('*')->where('id', '=', $delete)->delete();
            } 
            return back()->with('eliminar', '¡Jugadores Eliminados!');
        }
        
    }

    public function DeletePlayers2(Request $request){
        $deletes = $request->deletePlayers2;

        foreach($deletes as $delete){
            Ladder::select('*')->where('player_id', '=', $delete)->delete();
            Player::select('torneo_id')
                        ->where('players.id', '=', $delete)
                        ->update(['torneo_id' => null]);
        } 
        return back()->with('eliminar', 'ok');
    }

    public function EliminarTorneo($torneo_id){

        Player::select('torneo_id')
                        ->where('players.torneo_id', '=', $torneo_id)
                        ->update(['torneo_id' => null]);
        Ladder::select('*')->where('ladders.torneo_id', '=', $torneo_id)->delete();
        Torneo::select('*')->where('torneos.idTorneo', '=', $torneo_id)->delete();

        return back()->with('eliminarTorneo', 'ok');
    }
}
