<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class MuridAdmin extends Component
{
	use WithPagination;
	public $search;

    public function render()
    {
    	$searchParam = '%'.$this->search.'%';
    	$murid = User::where([
    		['role_id', '=', '3'],
    		['name', 'LIKE', $searchParam]
    	])
    	->orderBy('name', 'ASC')
    	->paginate(5);

        return view('livewire.murid-admin', ['murid' => $murid])
        ->extends('layouts.layout')
        ->section('content');
    }

    public function delete($id){
    	User::find($id)->delete();
    }
}
