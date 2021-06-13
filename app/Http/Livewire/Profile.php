<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
	use WithFileUploads;

	public $isOpen = 0;
    public $isOpenFoto = 0;

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


    	User::updateOrCreate(['id' => $this->user_id], [
    		'name' => $this->name,
    		'no_tlp' => $this->no_tlp,
    		'nomor_identitas' => $this->nik,
    		'alamat' => $this->alamat,
    		'sekolah' => $this->sekolah,
    	]);
    	// dd($this->poto);

    	$this->isClosed();

    	$this->user_id = "";
    	$this->name = "";
    	$this->no_tlp = "";
    	$this->nik = "";
    	$this->alamat = "";
    	$this->sekolah = "";
    }

    public function edit($id){
    	$user = User::find($id);

    	$this->user_id = $user->id;
    	$this->name = $user->name;
    	$this->no_tlp = $user->no_tlp;
    	$this->nik = $user->nomor_identitas;
    	$this->alamat = $user->alamat;
    	$this->sekolah = $user->sekolah;

    	$this->isOpen();
    }

    public function isOpen(){
    	$this->isOpen = true;
    }

    public function isClosed(){
    	$this->isOpen = false;
    }

    // UNTUK FOTO
    public function storeFoto(){

        $filename = 'poto_'.date('dmYHis').'.'.$this->poto->extension();
        $this->poto->storeAs('public/profile_photos', $filename);

        // dd($filename);
        // dd(Auth()->user()->profile_photo_path);
        if (Auth()->user()->profile_photo_path) {
            Storage::disk('local')->delete('public/profile_photos/'.Auth()->user()->profile_photo_path);
            Auth()->user()->profile_photo_path = null;
        }
        User::updateOrCreate(['id' => $this->user_id], [
            'profile_photo_path' => $filename,
        ]);
        // dd($this->poto);
        $this->isClosedFoto();
    }

    public function editFoto($id){
        $user = User::find($id);

        $this->user_id = $user->id;
        $this->poto = $user->profile_photo_path;

        $this->isOpenFoto();
    }

    public function deleteFoto($id){
        $foto = User::find($id);

        Storage::disk('local')->delete('public/profile_photos/'.$foto->profile_photo_path);

        $foto->profile_photo_path = null;
        $foto->save();
    }

    public function isOpenFoto(){
        $this->isOpenFoto = true;
    }

    public function isClosedFoto(){
        $this->poto = "";

        $this->isOpenFoto = false;
    }
    // END UNTUK FOTO
}
