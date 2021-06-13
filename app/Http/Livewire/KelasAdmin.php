<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use Livewire\WithPagination;

class KelasAdmin extends Component
{
	use WithPagination;
	public $search;

    public function render()
    {
    	$searchParam = '%'.$this->search.'%';
    	$kelas = Kelas::where('kelas', 'LIKE', $searchParam)
    	->orWhere('matkul', 'LIKE', $searchParam)
    	->orderBy('id', 'ASC')
    	->paginate(5);

        return view('livewire.kelas-admin', ['kelas' => $kelas])
        ->extends('layouts.layout')
        ->section('content');
    }
}
