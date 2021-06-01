<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MasukKelas extends Component
{
    public function render()
    {
    	return view('livewire.masuk-kelas')
    	->extends('layouts.layout')
    	->section('content');
    }
}
