<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use App\Models\DetilKelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;

class RuangKelas extends Component
{
	public $isOpen = 0;
	public $isOpenMasuk = 0;
	public $isDelete = 0;
	public $isMasuk = 0;

	public $kelas_id, $kelas, $matkul, $kodeJoin;

	public $kode_kelas;
	public $namaKelas;

    public function render()
    {	
    	$jml = Kelas::where('guru_id', '=', Auth()->user()->id)->count();
    	$kls = Kelas::all()
    	->where('guru_id', '=', Auth()->user()->id);

    	$jmlmrd = DetilKelas::where('murid_id', '=', Auth()->user()->id)->count();
    	$klsmrd = DetilKelas::all()
    	->where('murid_id', '=', Auth()->user()->id);

    	// dd($klsmrd);
        return view('livewire.ruang-kelas', ['kls'=>$kls, 'jml'=>$jml, 'klsmrd'=>$klsmrd, 'jmlmrd'=>$jmlmrd])
        ->extends('layouts.layout')
        ->section('content');
    }

    public function store(){
    	// dd($kodeJoin);
    	Kelas::updateOrCreate(['id'=>$this->kelas_id],[
    		'guru_id' => Auth()->user()->id,
    		'matkul' => $this->matkul,
    		'kelas' => $this->kelas,
    		'kode_join_kelas' => $this->kodeJoin,
    	]);

    	$this->hideModal();
    }

    public function editKelas($id){
    	$this->showModal();

    	$data = Kelas::find($id);

    	$this->kelas_id = $data->id;
    	$this->kelas = $data->kelas;
    	$this->matkul = $data->matkul;
    	$this->kodeJoin = $data->kode_join_kelas;

    }

    public function deleteKelas($id){
    	Kelas::find($id)->delete();
    	// dd($data);
    	// $this->hideConfirm();
    }

    public function showModal(){
    	$this->isOpen = true;
    	$this->kodeJoin = Str::random(6);
    }

    public function hideModal(){
    	$this->isOpen = false;

    	$this->kelas_id = '';
    	$this->matkul = '';
    	$this->kelas = '';
    	$this->kodeJoin = '';
    }

    public function showModalMasuk(){
    	$this->isOpenMasuk = true;
    }

    public function hideModalMasuk(){
    	$this->isOpenMasuk = false;

    	$this->kode_kelas = "";
    }

    public function joinKelas(){
        // $msg = 'Kode tidak cocok dengan kelas manapun, nih.';

    	$this->validate([
    		'kode_kelas' => 'required'
    	]);

    	$kode = $this->kode_kelas; /*ini dah oke*/
    	// dd($kode);
    	$data = Kelas::where('kode_join_kelas', '=', $kode)->get(); /*ini dah oke juga*/

    	// dd($x);
    	if ($data == '[]') {
    		session()->flash('message', 'Yah, kode tidak cocok dengan kelas manapun, nih.');
    	} else {
    		DetilKelas::create([
	    		'kelas_id' => $data[0]->id,
	    		'murid_id' => Auth()->user()->id
	    	]);

    		$this->hideModalMasuk();
    	}
    	

    }	

    public function showKelas(){
    	$this->isMasuk = true;
    }

    public function hideKelas(){
    	$this->isMasuk = false;
    }

    public function masukKelas($id){
    	$masuk = Kelas::find($id);
    	$this->namaKelas = $masuk->kelas;

    	$this->showKelas();
    }
}
