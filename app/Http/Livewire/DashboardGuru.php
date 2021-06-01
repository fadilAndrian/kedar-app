<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DashboardGuru extends Component
{
    public function render()
    {
        return view('livewire.dashboard-guru')
        ->extends('layouts.layout')
        ->section('content');
    }
}
