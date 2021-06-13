<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jadwal;
use App\Models\Tugas;
use App\Models\Kelas;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use DB;

class RuangGuru extends Component
{
    use WithFileUploads;
	use WithPagination;
	public $switch = 0;

	public $jadwal_id;
	public $kelas_id, $jam, $menit;
	public $jam_masuk, $menit_masuk, $jam_keluar, $menit_keluar, $hari;
	public $isOpenJadwal = 0, $isOpenTugas = 0;
	public $searchJadwal, $searchTugas;

    public $tugas_id, $deskripsi, $fileTugas, $deadline, $namaFile;                        /* untuk create tugas */

    public function render()
    {
        // JADWAL
    	$searchParamJadwal = '%'.$this->searchJadwal.'%';
 
    	$guru = Auth()->user()->id;

    	$jadwal = Jadwal::orderBy('hari', 'ASC')
    	->join('kelas', 'kelas.id', '=', 'jadwals.kelas_id')
    	->join('users', 'users.id', '=', 'kelas.guru_id')
    	->select('jadwals.id', 'jadwals.hari', 'jadwals.jam_mulai', 'jadwals.jam_selesai', 'kelas.kelas', 'kelas.matkul')
    	->where([
    		['users.id', '=', $guru],
    		['jadwals.hari', 'LIKE', $searchParamJadwal]
    	])->get();




        // TUGAS
        $searchParamTugas = '%'.$this->searchTugas.'%';

    	$tugas = Tugas::orderBy('akhir', 'ASC')
        ->join('kelas', 'kelas.id', '=', 'tugas.kelas_id')
        ->select('kelas.kelas', 'kelas.matkul', 'tugas.tugas', 'tugas.akhir', 'tugas.profile_photo_path', 'tugas.id')
        ->where([
            ['guru_id', '=' ,Auth()->user()->id],
            ['kelas', 'LIKE', $searchParamTugas]
        ])
        ->get();

    	$ruang = Kelas::all()->where('guru_id','=',$guru);

        return view('livewire.ruang-guru', ['jadwal' => $jadwal, 'tugas' => $tugas, 'ruang' => $ruang])
        ->extends('layouts.layout')
        ->section('content');
    }

    public function tugas(){
    	$this->switch = true;
    }

    public function jadwal(){
    	$this->switch = false;
    }

    public function showModalJadwal(){
    	return $this->isOpenJadwal = true;
    }

    public function hideModalJadwal(){
    	return $this->isOpenJadwal = false;
    }

    public function showModalTugas(){
    	return $this->isOpenTugas = true;
    }

    public function hideModalTugas(){
        $this->tugas_id = "";
        $this->kelas_id = "";
        $this->deskripsi = "";
        $this->deadline = "";
        $this->namaFile = "";
        $this->fileTugas = "";

    	return $this->isOpenTugas = false;
    }

    public function storeJadwal(){
    	$messages = [
    		'required' => 'Tolong dipilih'
    	];

    	$this->validate([
    		'kelas_id' => 'required',
    		'jam_masuk' => 'required',
    		'menit_masuk' => 'required',
    		'jam_keluar' => 'required',
    		'menit_keluar' => 'required',
    		'hari' => 'required',
    	], $messages);

    	Jadwal::updateOrCreate(['id'=>$this->jadwal_id], [
    		'kelas_id' => $this->kelas_id,
    		'jam_mulai' => $this->jam_masuk.":".$this->menit_masuk,
    		'jam_selesai' => $this->jam_keluar.":".$this->menit_keluar,
    		'hari' => $this->hari
    	]);

    	// dd($data);
    	$this->jadwal_id = "";
    	$this->kelas_id = "";
    	$this->jam_masuk = "";
    	$this->jam_keluar = "";
    	$this->menit_masuk = "";
    	$this->menit_keluar = "";
    	$this->hari = "";

    	$this->hideModalJadwal();

        session()->flash('succes', 'Jadwalnya dah siap! 🥳');
    }

    public function editJadwal($id){
		$data = Jadwal::find($id);

		$this->jadwal_id = $data->id;
		$this->kelas_id = $data->kelas_id;
		$this->hari = $data->hari;
		$this->jam_masuk = substr($data->jam_mulai, 0,2);
		$this->menit_masuk = substr($data->jam_mulai, 3,2);
		$this->jam_keluar = substr($data->jam_selesai, 0,2);
		$this->menit_keluar = substr($data->jam_selesai, 3,2);

		$this->showModalJadwal();
    }

    public function deleteJadwal($id){
		Jadwal::find($id)->delete();
        session()->flash('succes', 'Jadwal barusan udah dihapus, nih. 😏');
    }

    public function storeTugas(){
    	$messages = [
            'required' => 'Form ini kelupaan, nih.'
        ];

        $this->validate([
            'kelas_id' => 'required',
        ], $messages);

        // upload file
        if($this->fileTugas == null){
            $filename = null;
        } else {
            $filename = $this->fileTugas->getClientOriginalName();
            $this->fileTugas->storeAs('public/dokumen_tugas', $filename);
        }
        

        if ($this->tugas_id!=null) {
            $cekfile = Tugas::find($this->tugas_id);
        // dd($cekfile);

            if ($cekfile->profile_photo_path) {
                Storage::disk('local')->delete('public/dokumen_tugas/'.$cekfile->profile_photo_path);
            }
        }

    
        // end upload file

        $data = Tugas::updateOrCreate(['id'=>$this->tugas_id], [
            'kelas_id' => $this->kelas_id,
            'tugas' => $this->deskripsi,
            'mulai' => date('Y-m-d'),
            'akhir' => $this->deadline,
            'profile_photo_path' => $filename,

        ]);

        // dd($data);

        $this->hideModalTugas();

        session()->flash('succes', 'Tugas sudah dipublis, yaa. 🥳');
    }

    public function editTugas($id){
    	$data = Tugas::find($id);

        $this->tugas_id = $data->id;
        $this->kelas_id = $data->kelas_id;
        $this->deskripsi = $data->tugas;
        $this->deadline = $data->akhir;
        $this->namaFile = $data->profile_photo_path;

        $this->showModalTugas();
    }

    public function deleteTugas($id){
		Tugas::find($id)->delete();
        session()->flash('succes', 'Tugas barusan udah di-cancel, ya 😏');
    }
}
