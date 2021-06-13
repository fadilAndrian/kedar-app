<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Daring extends Component
{
    public function render()
    {
        return view('livewire.daring')
        ->extends('layouts.layout')
        ->section('content');
    }
}
