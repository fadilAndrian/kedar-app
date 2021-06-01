<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class GuruAdmin extends Component
{
	use WithPagination;
	public $search;

    public function render()
    {
    	$searchParam = '%'.$this->search.'%';
    	$guru = User::where([
    		['role_id', '=', '2'],
    		['name', 'LIKE', $searchParam]
    	])
    	->orderBy('name', 'ASC')
    	->paginate(5);

        return view('livewire.guru-admin', ['guru' => $guru])
        ->extends('layouts.layout')
        ->section('content');
    }

    public function delete($id){
    	User::find($id)->delete();
    }
}
