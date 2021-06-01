<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
	use WithFileUploads;

	public $isOpen = 0;

	public $user_id;
	public $name;
	public $no_tlp;
	public $nik;
	public $alamat;
	public $sekolah;
	public $data;
	public $poto;

    public function render()
    {	
    	$id = Auth()->user()->id;
    	$this->data = User::find($id);
    	// dd($data);
    	// $this->user_id = $data->id;
    	// $this->name = $data->name;
    	// $this->no_tlp = $data->no_tlp;
    	// $this->nik = $data->nik;
    	// $this->alamat = $data->alamat;
    	// $this->sekolah = $data->sekolah;

        return view('livewire.profile')
        ->extends('layouts.layout')
        ->section('content');
    }

    public function store(){

    	// $messages = [
    	// 	'numeric' => 'Hanya boleh diisi angka.',
    	// 	'max' => 'Jumlah karakternya kebanyakan, nih.'
    	// ];

    	// $this->validate([
    	// 	'no_tlp' => 'numeric|max:13',
    	// 	'nik' => 'numeric|max:30',
    	// ], $messages);


    	if (!empty($this->poto)) {
    		$this->poto->store('public/profile_photos');
    	}

    	User::updateOrCreate(['id' => $this->user_id], [
    		'name' => $this->name,
    		'no_tlp' => $this->no_tlp,
    		'nomor_identitas' => $this->nik,
    		'alamat' => $this->alamat,
    		'sekolah' => $this->sekolah,
    		'profile_photo_path' => $this->poto->hashName(),
    	]);
    	// dd($this->poto);
    	$this->isClosed();

    	$this->user_id = "";
    	$this->name = "";
    	$this->no_tlp = "";
    	$this->nik = "";
    	$this->alamat = "";
    	$this->sekolah = "";
    	$this->poto = "";
    }

    public function edit($id){
    	$user = User::find($id);

    	$this->user_id = $user->id;
    	$this->name = $user->name;
    	$this->no_tlp = $user->no_tlp;
    	$this->nik = $user->nomor_identitas;
    	$this->alamat = $user->alamat;
    	$this->sekolah = $user->sekolah;
    	$this->poto = $user->profile_photo_path;

    	$this->isOpen();
    }

    public function isOpen(){
    	$this->isOpen = true;
    }

    public function isClosed(){
    	$this->isOpen = false;
    }
}
