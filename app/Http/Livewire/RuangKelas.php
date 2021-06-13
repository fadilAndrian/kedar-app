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
    public $searchjdwlmrd;                                                     /* untuk wire:model search jadwal murid */

	public $isOpen = 0;
	public $isOpenMasuk = 0;
	public $isDelete = 0;
	public $isMasuk = 0;

	public $kelas_id, $kelas, $matkul, $kodeJoin;
    public $detil_kelas_id;

	public $kode_kelas;
	public $namaKelas;

    public function render()
    {	
    	$jml = Kelas::where('guru_id', '=', Auth()->user()->id)->count();      /* jumlah untuk guru */
    	$kls = Kelas::all()                                                    /* menampilkan kelas-kelas dari guru */
    	->where('guru_id', '=', Auth()->user()->id);

    	$jmlmrd = DetilKelas::where('murid_id', '=', Auth()->user()->id)->count();     /* jumlah untuk murid */
    	$klsmrd = DetilKelas::all()                                                    /* menampilkan kelas-kelas dari murid */
    	->where('murid_id', '=', Auth()->user()->id);

        $searchjdwlmrd_param = '%'.$this->searchjdwlmrd.'%';                    /* search untuk jadwal murid */

        $jdwlmrd = DetilKelas::orderBy('detil_kelas.id', 'ASC')                   /* menampilkan jadwal murid dari tabel detil_kelas */
        ->join('kelas', 'kelas.id', '=', 'detil_kelas.kelas_id')
        ->join('jadwals', 'jadwals.kelas_id', '=', 'kelas.id')
        ->join('users', 'users.id', '=', 'kelas.guru_id')
        ->select('jadwals.hari', 'kelas.kelas', 'kelas.matkul', 'jadwals.jam_mulai', 'jadwals.jam_selesai', 'users.name', 'detil_kelas.id')
        ->where([
            ['detil_kelas.murid_id', '=', Auth()->user()->id],
            ['jadwals.hari', 'LIKE', $searchjdwlmrd_param]
        ])
        ->get();

    	// dd($klsmrd);
        return view('livewire.ruang-kelas', ['kls'=>$kls, 'jml'=>$jml, 'klsmrd'=>$klsmrd, 'jmlmrd'=>$jmlmrd, 'jdwlmrd'=>$jdwlmrd])
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

        session()->flash('succes', 'Kelas udah siap, nih. 😉');
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
        session()->flash('succes', 'Kelas yang tadi udah dihapus, ya. 😉');
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
        $data2 = DetilKelas::join('kelas', 'kelas.id', '=', 'detil_kelas.kelas_id')
        ->where([
            ['murid_id', '=', Auth()->user()->id],
            ['kelas.kode_join_kelas', '=', $kode]
        ])
        ->get();

    	// dd($x);
    	if ($data == '[]') {
    		session()->flash('message', 'Yah, kode tidak cocok dengan kelas manapun, nih.');
    	} else {
            if ($data2 == '[]') {
        		DetilKelas::create([
    	    		'kelas_id' => $data[0]->id,
    	    		'murid_id' => Auth()->user()->id
    	    	]);

        		$this->hideModalMasuk();

                session()->flash('succes', 'Selamat datang di kelas. 👋😄');
            } else {
                session()->flash('message', 'Kamu udah ada di kelas ini, lho.');
            }
    	}
    }	

    public function keluarKelas($id){
        DetilKelas::find($id)->delete();
        // dd($data);
        // $this->hideConfirm();
        $this->hideKelas();
        session()->flash('succes', 'Sayonara kawan. Salam cinta dari kelas ini. 😊');
    }

    public function showKelas(){
    	$this->isMasuk = true;
    }

    public function hideKelas(){
    	$this->isMasuk = false;
    }

    public function masukKelas($id){
    	$masuk = Kelas::find($id);
    	$this->namaKelas = $masuk->kelas.' - '.$masuk->matkul;
    	$this->kode_kelas = $masuk->kode_join_kelas;

    	$this->showKelas();
    }

    public function masukKelasMurid($id){
    	$masuk = DetilKelas::find($id);
    	$this->detil_kelas_id = $masuk->id;
        $this->namaKelas = $masuk->kelas->kelas.' - '.$masuk->kelas->matkul;
    	$this->kode_kelas = $masuk->kelas->kode_join_kelas;

    	$this->showKelas();
    }
}
