<?php

namespace App\Http\Livewire;

use App\Http\Controllers\NotesController;
use Livewire\Component;

class FilieresList extends Component
{
    public $year;
    public function mount($year)
    {
        $this->$year = $year;
    }
    public function render()
    {
        $filieres = NotesController::getFilieres($this->year);
        return view('livewire.filieres-list',[
            "filieres"=>$filieres,
            "year"=>$this->year
        ]);
    }
}
