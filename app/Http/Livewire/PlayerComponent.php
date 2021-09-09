<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Player;
use App\Models\Torneo;
use App\Models\Ladder;

class PlayerComponent extends Component
{
    // use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.player-component', [
            'players' => Player::where('name', 'LIKE', '%'.$this->search.'%')
            ->orderBy('id', 'asc')->paginate(10),
            'torneos' => Torneo::all(),
            'ladders' => Ladder::all(),
        ]);
    }
}
