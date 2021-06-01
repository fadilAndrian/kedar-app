<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Role;

class Roles extends Component
{
	// public $updateId = 0;
	public $roles;
	public $isOpen = 0;
	public $role, $keterangan, $role_id;

    public function render()
    {
    	$this->roles = Role::all();

        return view('livewire.roles')
        ->extends('layouts.layout')
        ->section('content');
    }

    public function store(){
    	$this->validate([
    		'role' => 'required'
    	]);

    	Role::updateOrCreate(['id' => $this->role_id], [
    		'role' => $this->role,
    		'keterangan' => $this->keterangan,
    	]);

    	$this->hideModal();

    	$this->roleId = "";
    	$this->role = "";
    	$this->keterangan = "";

    	// $role = Role::find($roleId);

    	// $this->updateId = $roleId;
    	// $this->role = $role->role;
    	// $this->keterangan = $role->keterangan;
    }

    public function editRole($id){
    	$data = Role::find($id);

    	$this->role_id = $id;
    	$this->role = $data->role;
    	$this->keterangan = $data->keterangan;

    	$this->showModal();
    }

    public function hapusRole($id){
    	Role::find($id)->delete();
    }

    public function showModal(){
    	$this->isOpen = true;
    }

    public function hideModal(){
    	$this->isOpen = false;
    }

}
