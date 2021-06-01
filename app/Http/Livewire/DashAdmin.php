<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DashAdmin extends Component
{
    public function render()
    {
        return view('livewire.dash-admin')
        ->extends('layouts.layout')
        ->section('content');
    }
}
