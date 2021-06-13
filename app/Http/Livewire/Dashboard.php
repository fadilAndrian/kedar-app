<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DetilKelas;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
	public $searchjdwlmrd;

    public function render()
    {
    	$searchjdwlmrd_param = '%'.$this->searchjdwlmrd.'%';

    	$kelas = DetilKelas::orderBy('detil_kelas.id', 'ASC')
    	->join('kelas', 'kelas.id', '=', 'detil_kelas.kelas_id')
    	->join('jadwals', 'jadwals.kelas_id', '=', 'kelas.id')
    	->join('users', 'users.id', '=', 'kelas.guru_id')
    	->where([
    		['detil_kelas.murid_id', '=', Auth()->user()->id],
    		['jadwals.hari', 'LIKE', $searchjdwlmrd_param]
    	])
    	->get();

    	// dd($kelas);
        return view('livewire.dashboard', ['kelas'=>$kelas])
        ->extends('layouts.layout')
        ->section('content');
    }
}
